<?php

class Prj_Mtrl_Payment extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Prj_Mtrl_Payment_model'); 
         /* Title Page :: Common */
         $this->page_title->push('Payments');
         $this->data['pagetitle'] = $this->page_title->show();
 
         /* Breadcrumbs :: Common */
         $this->breadcrumbs->unshift(1, 'Material Status', 'Prj_Mtrl_Payment/index');
    }
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Proj_Mtrl_Payment/index?');
        $config['total_rows'] = $this->Prj_Mtrl_Payment_model->getCount();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['payments'] = $this->Prj_Mtrl_Payment_model->getData();
        $this->template->public_render('Proj_Mtrl_Payment/index', $this->data);   
    }

    function add()
    {   
        $this->breadcrumbs->unshift(2, 'Add', 'Prj_Mtrl_Payment/add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');

		$this->form_validation->set_rules('name','Name','required|max_length[255]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'mode' => $this->input->post('name'),
            );
            $infoCheck = $this->Prj_Mtrl_Payment_model->checkData($params['mode']);
            if(!$infoCheck){
                $status_id = $this->Prj_Mtrl_Payment_model->addData($params);
                redirect('Prj_Mtrl_Payment/index');
            } else{
                $this->data['err'] = 'The name'.$params['mode'].'already in use!!';
                $this->template->public_render('Proj_Mtrl_Payment/add',$this->data);
            }
        }
        else
        {      
            $this->template->public_render('Proj_Mtrl_Payment/add', $this->data);      
           
        }
    }  

    /*
     * Editing a status
     */
    function edit($id)
    {   
        $this->breadcrumbs->unshift(2, 'Edit', 'Prj_Mtrl_Payment/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        // check if the status exists before trying to edit it
        $this->data['status'] = $this->Prj_Mtrl_Payment_model->getDetail($id);
        
        if(isset($this->data['status']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('name','Name','required|max_length[255]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'mode' => $this->input->post('name'),
                );
                $infoCheck = $this->Prj_Mtrl_Payment_model->checkEdit($id,$params['mode']);
                if(!$infoCheck){
                    $this->Prj_Mtrl_Payment_model->editDetail($id,$params);            
                    redirect('Prj_Mtrl_Payment/index');
                }else{
                    $this->data['err'] = 'The name '.$params['mode'].' already in use!!';
                    $this->template->public_render('Proj_Mtrl_Payment/edit',$this->data);
                }
            }
            else
            {
                $this->template->public_render('Proj_Mtrl_Payment/edit', $this->data); 
            }
        }
        else
            show_error('The status you are trying to edit does not exist.');
    } 

    /*
     * Deleting status
     */
    function remove($id)
    {
        $status = $this->Prj_Mtrl_Payment_model->getDetail($id);

        // check if the status exists before trying to delete it
        if(isset($status['id']))
        {
            $this->Prj_Mtrl_Payment_model->deleteData($id);
            redirect('Prj_Mtrl_Payment/index');
        }
        else
            show_error('The status you are trying to delete does not exist.');
    }
    
}

?>