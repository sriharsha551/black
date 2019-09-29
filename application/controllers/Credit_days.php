<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Credit_days extends Admin_Controller
{
    public function __construct() {
        parent :: __construct();
        $this->load->model('Credit_days_model');
        $this->page_title->push('credit days');
        $this->data['pagetitle'] = $this->page_title->show();
          /* Breadcrumbs :: Common */
          $this->breadcrumbs->unshift(1, 'Credit days', 'Credit_days');

    }
    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Credit_days/index?');
        $this->pagination->initialize($config);
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['cr'] = $this->Credit_days_model->get_all_cr_days($params);
        $this->template->public_render('Credit_days/index', $this->data);
}

   
    function add()
    {   
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','name','required');
        if($this->form_validation->run())     
        {   
            $data = $this->input->post();
            $suppliers = $this->Credit_days_model->add_credit_days($data);
            
            redirect('Credit_days/index');
    
        }
        else
        {  
            $this->template->public_render('Credit_days/add', $this->data);      
           
        }
    
   }
   function edit($id)
   {
       // $_SESSION['measurement_filter_id'] = $this->input->post('prj_id');         

       $this->breadcrumbs->unshift(2, 'Edit', 'edit'); 
       $this->data['breadcrumb'] = $this->breadcrumbs->show();
       // check if the site measurement exists before trying to edit it
           $this->data['credit'] = $this->Credit_days_model->get_credit_days($id);
           if(isset($this->data['credit']['id']))
         {
           $this->load->library('form_validation');
           $this->form_validation->set_rules('name','name','required');
           if($this->form_validation->run())     
            {   
                $data = $this->input->post();
                $this->Credit_days_model->update_credit($id,$data);            
                redirect('Credit_days/index');
            }
            else
            {
                $this->template->public_render('Credit_days/edit', $this->data); 
            }
   }
   else
            {
                show_error('The credit amount you are trying to edit does not exist.');

            }
}
public function delete($id) 
{
    $this->Credit_days_model->delete($id);
    redirect("Credit_days/");
}
}