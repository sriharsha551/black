<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Trade extends Admin_Controller
{
    public function __construct() {
        parent :: __construct();
        $this->load->model('Trade_model');
        $this->page_title->push('Trade');
        $this->data['pagetitle'] = $this->page_title->show();
          $this->breadcrumbs->unshift(1, 'Trade', 'Trade');

    }

    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Trade/index?');
        $this->pagination->initialize($config);
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['trade'] = $this->Trade_model->get_all_trade($params);
        $this->template->public_render('Trade/index', $this->data);
    }

    function add()
    {   
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('trade_name','Trade name','required');
        if($this->form_validation->run())     
        {   
            $data = $this->input->post();
            $suppliers = $this->Trade_model->add_trade($data);
            
            redirect('Trade/index');
    
        }
        else
        {  
            $this->template->public_render('Trade/add', $this->data);      
           
        }
   }

   function edit($id)
   {
    $this->breadcrumbs->unshift(2, 'Edit', 'edit'); 
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    // check if the site measurement exists before trying to edit it
        $this->data['trade'] = $this->Trade_model->get_trade($id);
        // print_r($this->data['trade']);
        if(isset($this->data['trade'][0]['id']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('trade_name','Trade Name','required');
            if($this->form_validation->run())     
            {   
                $data = $this->input->post();
                $this->Trade_model->update_trade($id,$data);            
                redirect('Trade/index');
            }
            else
            {
                $this->template->public_render('Trade/edit', $this->data); 
            }
        }
    else
        {
            show_error('The trade amount you are trying to edit does not exist.');
        }
    }

   function delete($id)
   {
    $data = $this->Trade_model->get_trade($id)[0];
    if (isset($data['id'])) {
        $this->Trade_model->delete_trade($id,$data);
        redirect('Trade/index');
   }
}
}