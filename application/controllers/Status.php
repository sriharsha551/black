<?php

class Status extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Status_model'); 
         /* Title Page :: Common */
         $this->page_title->push('Status');
         $this->data['pagetitle'] = $this->page_title->show();
 
         /* Breadcrumbs :: Common */
         $this->breadcrumbs->unshift(1, 'Status', 'Status');
    }
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Proj_Status/index?');
        $config['total_rows'] = $this->Status_model->getCount();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['status'] = $this->Status_model->getData();
        $this->template->public_render('Proj_Status/index', $this->data);   
    }

    function add()
    {   
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');

		$this->form_validation->set_rules('name','Name','required|max_length[255]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'status_name' => $this->input->post('name'),
            );
            
            $status_id = $this->Status_model->addData($params);
            redirect('Status/index');
        }
        else
        {      
            $this->template->public_render('Proj_Status/add', $this->data);      
           
        }
    }  

    /*
     * Editing a status
     */
    function edit($id)
    {   
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        // check if the status exists before trying to edit it
        $this->data['status'] = $this->Status_model->getDetail($id);
        
        if(isset($this->data['status']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('name','Name','required|max_length[255]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'status_name' => $this->input->post('name'),
                );

                $this->Status_model->editDetail($id,$params);            
                redirect('Status/index');
            }
            else
            {
                $this->template->public_render('Proj_Status/edit', $this->data); 
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
        $status = $this->Status_model->getDetail($id);

        // check if the status exists before trying to delete it
        if(isset($status['id']))
        {
            $this->Status_model->deleteData($id);
            redirect('Status/index');
        }
        else
            show_error('The status you are trying to delete does not exist.');
    }
    
}

?>