<?php
 class Area extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Area_model');
         $this->page_title->push('Area');
         $this->data['pagetitle'] = $this->page_title->show();
         $this->breadcrumbs->unshift(1, 'Area', 'Area');
    } 
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Area/index?');
        $this->pagination->initialize($config);
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['area'] = $this->Area_model->get_all_area($params);
        $this->template->public_render('Area/index', $this->data);

    }
    function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['prj'] = $this->Area_model->get_prj_list();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('area','Area','required|max_length[11]');
		if($this->form_validation->run())     
        {   
            
            $params = $this->input->post();
            $concept_id = $this->Area_model->add_area($params);
            redirect('Area/index');
        }
        else
        {      
            $this->template->public_render('Area/add', $this->data);      
           
        }
        }
        function edit($id)
        {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['ar'] = $this->Area_model->get_area_list($id);
        $this->data['prj'] = $this->Area_model->get_prj_list();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('area','Area','required|max_length[11]');
		if($this->form_validation->run())     
        {   
            
            $params = $this->input->post();
            $concept_id = $this->Area_model->update_area($id,$params);
            redirect('Area/index');
        }
        else
        {      
            $this->template->public_render('Area/edit', $this->data);      
           
        }
        }
        public function remove($id)
        {
            $inv = $this->Area_model->get_area_detail($id);
            if (isset($inv['id'])) {
                $this->Area_model->delete_area($id);
                redirect('Area/index');
            }
        }
    
}