<?php 

class Machinary extends Admin_Controller
{
    public function __construct() {
        parent :: __construct();
        $this->load->model('Machinary_model');
        $this->page_title->push('Machinary');
        $this->data['pagetitle'] = $this->page_title->show();
        $this->breadcrumbs->unshift(1, 'Machinary', 'Machinary');
    }

    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Machinary/index?');
        $this->pagination->initialize($config);
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['tools'] = $this->Machinary_model->get_all_tools($params);
        $this->template->public_render('Machinary/index', $this->data);
    }
    function add()
    {   
    $this->breadcrumbs->unshift(2, 'Add', 'add');
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->load->library('form_validation');
    $this->form_validation->set_rules('tool_name','Tool Name','required');
    $this->form_validation->set_rules('qty','Quantity','required');
    if($this->form_validation->run())     
    {   
        $data = $this->input->post();
        $this->Machinary_model->add_machinary($data);
        redirect('Machinary/index');

    }
    else
    {  
        $this->template->public_render('Machinary/add', $this->data);      
       
    }
    }
    function edit($id)
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tool_name','Tool Name','required');
        $this->form_validation->set_rules('qty','Quantity','required');
        $this->data['tool'] = $this->Machinary_model->get_machinary($id);
        if(isset($this->data['tool']['id']))
        {
        if($this->form_validation->run())     
        {   
            $data = $this->input->post();
            $this->Machinary_model->update_machinary($id,$data);
            redirect('Machinary/index');
    
        }
        else
        {  
            $this->template->public_render('Machinary/edit', $this->data);      
           
        }
    }
    else
    {
        show_error('The machinary you are trying to edit does not exist.');

    }
    }
    function delete($id)
    {
        $this->Machinary_model->delete($id);
        redirect("Machinary/");
    }

}