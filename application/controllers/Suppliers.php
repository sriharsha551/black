<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Suppliers extends User_Controller
{
    public function __construct() {
        parent :: __construct();
        $this->load->model('Suppliers_model');
        $this->page_title->push('Suppliers');
        $this->data['pagetitle'] = $this->page_title->show();
          /* Breadcrumbs :: Common */
          $this->breadcrumbs->unshift(1, 'Suppliers', 'Suppliers');

    }
    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Suppliers/index?');
        // $config['total_rows'] = $this->Suppliers_model->get_all_prj_site_measurements_count();
        $this->pagination->initialize($config);
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['sup'] = $this->Suppliers_model->get_all_Suppliers($params);
        $this->template->public_render('Suppliers/index', $this->data);
}
function add()
{   
    $this->breadcrumbs->unshift(2, 'Add', 'add');
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name','name','required');
    $this->form_validation->set_rules('email_id','email_id','required');
    $this->form_validation->set_rules('contact_no_1','contact number','required');
    $this->form_validation->set_rules('contact_no_2','alternative number','required');  
    $this->form_validation->set_rules('address','address','required');
    $this->form_validation->set_rules('location','location','required');
    if($this->form_validation->run())     
    {   
        $data = $this->input->post();
        $suppliers = $this->Suppliers_model->add_suppliers($data);
        
        redirect('Suppliers/index');

    }
    else
    {  
        $this->template->public_render('Suppliers/add', $this->data);      
       
    }
}
function edit($id)
    {   
        // $_SESSION['measurement_filter_id'] = $this->input->post('prj_id');         

        $this->breadcrumbs->unshift(2, 'Edit', 'edit'); 
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        // check if the site measurement exists before trying to edit it
            $this->data['suppliers'] = $this->Suppliers_model->get_suppliers($id);
            if(isset($this->data['suppliers']['id']))
          {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name','name','required');
            $this->form_validation->set_rules('email_id','email_id','required');
            $this->form_validation->set_rules('contact_no_1','contact number','required');
            $this->form_validation->set_rules('contact_no_2','alternative number','required');  
            $this->form_validation->set_rules('address','address','required');
            $this->form_validation->set_rules('location','location','required');
			
		   if($this->form_validation->run())     
            {   
                $data = $this->input->post();
                $this->Suppliers_model->update_suppliers($id,$data);            
                redirect('Suppliers/index');
            }
            else
            {
                $this->template->public_render('Suppliers/edit', $this->data); 
            }
        }
            else
            {
                show_error('The Design layout you are trying to edit does not exist.');

            }

}
public function delete($id) 
{
    $this->Suppliers_model->delete($id);
    redirect("Suppliers/");
}
}