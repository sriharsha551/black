<?php
    class Type extends User_Controller{
        public function __construct(){
            parent :: __construct();
            $this->load->model('Type_model');
    
            $this->page_title->push('Project Type');
            $this->data['pagetitle'] = $this->page_title->show();
    
            $this->breadcrumbs->unshift(1, 'Type', 'Type');
        }

        public function index(){
            $params['limit'] = RECORDS_PER_PAGE; 
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
            
            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('Proj_Type/index?');
            $config['total_rows'] = $this->Type_model->getCount();
            $this->pagination->initialize($config);
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['type'] = $this->Type_model->getAllTypes();
            $this->template->public_render('Proj_Type/index', $this->data);
        }

    public function add()
    {   
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');

		$this->form_validation->set_rules('name','Name','required|max_length[255]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'type' => $this->input->post('name'),
            );
            
            $type_id = $this->Type_model->addType($params);
            redirect('Type/index');
        }
        else
        {      
            $this->template->public_render('Proj_Type/add', $this->data);      
           
        }
    }  

    /*
     * Editing a type
     */
    public function edit($id)
    {   
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        // check if the type exists before trying to edit it
        $this->data['type'] = $this->Type_model->getType($id);
        
        if(isset($this->data['type']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('name','Name','required|max_length[255]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'type' => $this->input->post('name'),
                );

                $this->Type_model->editType($id,$params);            
                redirect('Type/index');
            }
            else
            {
                $this->template->public_render('Proj_Type/edit', $this->data); 
            }
        }
        else
            show_error('The type you are trying to edit does not exist.');
    } 

    /*
     * Deleting type
     */
    public function remove($id)
    {
        $type = $this->Type_model->getType($id);

        // check if the type exists before trying to delete it
        if(isset($type['id']))
        {
            $this->Type_model->deleteType($id);
            redirect('Type/index');
        }
        else
            show_error('The type you are trying to delete does not exist.');
    }
    
}

?>