<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaction extends Admin_Controller
{
    public function __construct() {
        parent :: __construct();
        $this->load->model('Transaction_model');
        $this->page_title->push('Transactions');
        $this->data['pagetitle'] = $this->page_title->show();
          /* Breadcrumbs :: Common */
          $this->breadcrumbs->unshift(1, 'Transactions', 'Transaction');

    }
    public function index()
    {
      $params['limit'] = RECORDS_PER_PAGE; 
      $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
      
      $config = $this->config->item('pagination');
      $config['base_url'] = site_url('Transaction/index?');
      $this->pagination->initialize($config);
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->data['tran'] = $this->Transaction_model->get_all_Transaction($params);
      $this->template->public_render('Transaction/index', $this->data);
  }
  function add()
  {   
      $this->data['coa_list'] = $this->Transaction_model->get_all_coa_list();
      $this->breadcrumbs->unshift(2, 'Add', 'add');
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->load->library('form_validation');
      $this->form_validation->set_rules('date_transaction','Date of transaction','required');
      $this->form_validation->set_rules('coa_id','Chart of Accounts name','required');
      $this->form_validation->set_rules('purpose','purpose','required');
      $this->form_validation->set_rules('payment_amt','Payment amount','required');
      $this->form_validation->set_rules('remarks','remarks','required');
  
      if($this->form_validation->run())     
      {   
          $data = $this->input->post();
          $transaction = $this->Transaction_model->add_transaction($data);
          
          redirect('Transaction/index');
  
      }
      else
      {  
          $this->template->public_render('Transaction/add', $this->data);      
         
      }
  }
  function edit($id)
  {
    $this->breadcrumbs->unshift(2, 'Edit', 'edit'); 
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->data['tran_list'] = $this->Transaction_model->get_transactions($id);
    $this->data['coa_list'] = $this->Transaction_model->get_all_coa_list($id);
    if(isset($this->data['tran_list']['id']))
          {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('date_transaction','Date of transaction','required');
            $this->form_validation->set_rules('coa_id','coa_id','required');
            $this->form_validation->set_rules('purpose','purpose','required');
            $this->form_validation->set_rules('payment_amt','Payment amount','required');
            $this->form_validation->set_rules('remarks','remarks','required');

		   if($this->form_validation->run())     
            {   
                $data = $this->input->post();
                $this->Transaction_model->update_transaction($id,$data);            
                redirect('Transaction/index');
            }
            else
            {
                $this->template->public_render('Transaction/edit', $this->data); 
            }
        }
            else
            {
                show_error('The transaction you are trying to edit does not exist.');

            }

  }
  public function remove($id)
  {
      $inv = $this->Transaction_model->get_transactions_detail($id);
      // check if the stage exists before trying to delete it
      if (isset($inv['id'])) {
          $this->Transaction_model->delete_transactions($id);
          redirect('Transaction/index');
      }
  }
}