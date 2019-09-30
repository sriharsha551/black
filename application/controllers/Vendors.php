<?php 
class Vendors extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vendors_model');
         $this->page_title->push('Vendors');
         $this->data['pagetitle'] = $this->page_title->show();
         $this->breadcrumbs->unshift(1, 'Vendors', 'Vendors');
    } 
  
        function index()
        {
            $params['limit'] = RECORDS_PER_PAGE; 
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
            
            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('Vendors/index?');
            $this->pagination->initialize($config);
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['Vendors'] = $this->Vendors_model->get_all_Vendors($params);
            
            $this->template->public_render('Vendors/index', $this->data);
    
       
        }
        function add()
        {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->data['machinary'] = $this->Vendors_model->get_machinary();
        $this->form_validation->set_rules('vendor_name','Vendors Name','required|max_length[255]');
        $this->form_validation->set_rules('vendor_email','Vendors Nmail','required|max_length[255]');
        $this->form_validation->set_rules('vendor_phone','Vendors Phone','required|max_length[11]');
        $this->form_validation->set_rules('vendor_address','Vendors Address','required|max_length[11]');
        $this->form_validation->set_rules('units','Unit','required|max_length[11]');
        $this->form_validation->set_rules('price','Price','required|max_length[11]');
		if($this->form_validation->run())     
        {   
            
            $params = $this->input->post();
            $concept_id = $this->Vendors_model->add_vendors($params);
            redirect('Vendors/index');
        }
        else
        {      
            $this->template->public_render('vendors/add', $this->data);      
           
        }
        }
        function edit($id)
        {

        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['machinary'] = $this->Vendors_model->get_machinary();
        $this->data['vendors'] = $this->Vendors_model->get_vendors($id);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('vendor_name','Vendors Name','required|max_length[255]');
        $this->form_validation->set_rules('vendor_email','Vendors Nmail','required|max_length[255]');
        $this->form_validation->set_rules('vendor_phone','Vendors Phone','required|max_length[11]');
        $this->form_validation->set_rules('vendor_address','Vendors Address','required|max_length[11]');
        $this->form_validation->set_rules('units','Unit','required|max_length[11]');
        $this->form_validation->set_rules('price','Price','required|max_length[11]');
		if($this->form_validation->run())     
        {   
            
            $params = $this->input->post();
            $concept_id = $this->Vendors_model->update_vendors($id,$params);
            redirect('Vendors/index');
        }
        else
        {      
            $this->template->public_render('vendors/edit', $this->data);      
           
        }
        }
        public function remove($id)
        {
            $inv = $this->Vendors_model->get_vendors_detail($id);
            // check if the stage exists before trying to delete it
            if (isset($inv['id'])) {
                $this->Vendors_model->delete_vendors($id);
                redirect('vendors/index');
            }
        }
    
}