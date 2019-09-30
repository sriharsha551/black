<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class  Invoice_items extends Admin_Controller
{
    public function __construct() {
        parent :: __construct();
        $this->load->model('Invoice_items_model');
        $this->page_title->push('Invoice items');
        $this->data['pagetitle'] = $this->page_title->show();
          /* Breadcrumbs :: Common */
          $this->breadcrumbs->unshift(1, 'invoice items', ' Invoice_items');

    }
    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Invoice_items/index?');
        $this->pagination->initialize($config);
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['inv'] = $this->Invoice_items_model->get_all_invoice_items($params);
        $this->template->public_render('Invoice_items/index', $this->data);
}

   
    function add()
    {   
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item_name','item_name','required');
        $this->form_validation->set_rules('price','price','required');
        $this->form_validation->set_rules('quality','quality','required');
        if($this->form_validation->run())     
        {   
            $data = $this->input->post();
            $some= $this->Invoice_items_model->add_invoice_items($data);
            redirect('Invoice_items/index');
    
        }
        else
        {  
            $this->template->public_render('invoice_items/add', $this->data);      
           
        }
    
   }
   function edit($id)
   {
       // $_SESSION['measurement_filter_id'] = $this->input->post('prj_id');         

       $this->breadcrumbs->unshift(2, 'Edit', 'edit'); 
       $this->data['breadcrumb'] = $this->breadcrumbs->show();
       // check if the site measurement exists before trying to edit it
           $this->data['inv'] = $this->Invoice_items_model->get_invoice_items($id);
           if(isset($this->data['inv']['id']))
         {
           $this->load->library('form_validation');
           $this->form_validation->set_rules('item_name','item_name','required');
           $this->form_validation->set_rules('price','price','required');
           $this->form_validation->set_rules('quality','quality','required');
           if($this->form_validation->run())     
            {   
                $data = $this->input->post();
                $this->Invoice_items_model->update_invoice_items($id,$data);            
                redirect('Invoice_items/index');
            }
            else
            {
                $this->template->public_render('Invoice_items/edit', $this->data); 
            }
   }
   else
            {
                show_error('The credit amount you are trying to edit does not exist.');

            }
}
public function delete($id) 
{
    $this->Invoice_items_model->delete($id);
    redirect("Invoice_items/");
}
}