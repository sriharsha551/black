<?php

class Stage extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Stage_model'); 
         /* Title Page :: Common */
         $this->page_title->push('Stage');
         $this->data['pagetitle'] = $this->page_title->show();
 
         /* Breadcrumbs :: Common */
         $this->breadcrumbs->unshift(1, 'Stage', 'Stage');
    }
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Proj_Stage/index?');
        $config['total_rows'] = $this->Stage_model->getCount();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['stage'] = $this->Stage_model->getAllStages();
        $this->template->public_render('Proj_Stage/index', $this->data);   
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
				'stage_name' => $this->input->post('name'),
            );
            
            $stage_id = $this->Stage_model->addStage($params);
            redirect('Stage/index');
        }
        else
        {      
            $this->template->public_render('Proj_Stage/add', $this->data);      
           
        }
    }  

    /*
     * Editing a stage
     */
    function edit($id)
    {   
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        // check if the stage exists before trying to edit it
        $this->data['stage'] = $this->Stage_model->getStage($id);
        
        if(isset($this->data['stage']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('name','Name','required|max_length[255]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'stage_name' => $this->input->post('name'),
                );

                $this->Stage_model->editStage($id,$params);            
                redirect('Stage/index');
            }
            else
            {
                $this->template->public_render('Proj_Stage/edit', $this->data); 
            }
        }
        else
            show_error('The stage you are trying to edit does not exist.');
    } 

    /*
     * Deleting stage
     */
    function remove($id)
    {
        $stage = $this->Stage_model->getStage($id);

        // check if the stage exists before trying to delete it
        if(isset($stage['id']))
        {
            $this->Stage_model->deleteStage($id);
            redirect('Stage/index');
        }
        else
            show_error('The stage you are trying to delete does not exist.');
    }
    
}

?>