<?php 

class Invoice_payments extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_payments_model');
        
        $this->page_title->push('Invoice Payments');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Invoice Payments', 'Invoice_payments');
    }

    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Invoice_payments/index?');
        $config['total_rows'] = $this->Invoice_payments_model->get_all_invoice_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['invoice'] = $this->Invoice_payments_model->get_all_invoice($params);
        $this->template->public_render('Invoice_payments/index',$this->data);
    }

    function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['inv_ids'] = $this->Invoice_payments_model->get_inv_ids();
        $this->data['coa_ids'] = $this->Invoice_payments_model->get_coa_ids();
        $this->data['tran_ids'] = $this->Invoice_payments_model->get_tran_ids();
        $this->data['pay_ids'] = $this->Invoice_payments_model->get_pay_ids();
        $this->data['amounts'] = $this->Invoice_payments_model->get_inv_amount();
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('inv_id','Invoice Id','required');
        $this->form_validation->set_rules('coa_id','Coa id','required');
        $this->form_validation->set_rules('paid_dt','Paid Date','required');
        $this->form_validation->set_rules('amount','Amount','required');
        $this->form_validation->set_rules('amount_recieved','Amount Recieved','required');       
        // $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('pay_method','Pay Method','required');
        // $this->form_validation->set_rules('remarks','Remarks','required');
        // $this->form_validation->set_rules('tran_type_id','Transactin type','required');

        if($this->form_validation->run())     
        {   
            $params = $this->input->post();
            if($params['amount_recieved'] < $params['amount'] && $params['amount_recieved'] != 0 )
            {
                $status = 2;
            }
            else if($params['amount_paid']==0)
                {
                    $status = 1;
                }
            else{
                $status = 3;
            }
            $concept_id = $this->Invoice_payments_model->add_invoice($params);
            $this->Invoice_payments_model->add_transaction($params);
            $this->Invoice_payments_model->update_invoice($status,$params['inv_id']);
            redirect('Invoice_payments/index');
        }
        else
        {
            $_SESSION['edit_error'] = true;
            $this->template->public_render('Invoice_payments/add', $this->data);      
        }
    }

    function edit($id)
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['invoice'] = $this->Invoice_payments_model->get_invoice($id);
        $this->data['inv_ids'] = $this->Invoice_payments_model->get_inv_ids();
        $this->data['coa_ids'] = $this->Invoice_payments_model->get_coa_ids();
        $this->data['tran_ids'] = $this->Invoice_payments_model->get_tran_ids();
        $this->data['pay_ids'] = $this->Invoice_payments_model->get_pay_ids();
        $this->data['amounts'] = $this->Invoice_payments_model->get_inv_amount();

        if(isset($this->data['invoice']['id']))
        {
            $this->form_validation->set_rules('inv_id','Invoice Id','required');
            $this->form_validation->set_rules('coa_id','Coa id','required');
            $this->form_validation->set_rules('paid_dt','Paid Date','required');
            $this->form_validation->set_rules('amount','Amount','required');
            $this->form_validation->set_rules('amount_recieved','Amount Recieved','required');       
            // $this->form_validation->set_rules('description','Description','required');
            $this->form_validation->set_rules('pay_method','Pay Method','required');
            // $this->form_validation->set_rules('remarks','Remarks','required');
            // $this->form_validation->set_rules('tran_type_id','Transactin type','required');

            if($this->form_validation->run())     
            {   
                $params = $this->input->post();
                if($params['amount_recieved]'] < $params['amount'] && $params['amount_recieved'] != 0 )
                {
                    $status = 2;
                }
                else if($params['amount_recieved']==0)
                {
                       $status = 1;
                }
                else{
                    $status = 3;
                }
                $this->Invoice_payments_model->update_invoice_pay($id,$params);
                $this->Invoice_payments_model->update_invoice($status,$params['inv_id']);
                redirect('Invoice_payments/index');
            }
            else
            {
                $_SESSION['edit_error'] = true;
                $this->template->public_render('Invoice_payments/edit', $this->data); 
            }
        }
        else
        show_error('The invoice you are trying to edit does not exist.');
    }

    function remove($id)
    {
        $inv = $this->Invoice_payments_model->get_invoice($id);
        // check if the stage exists before trying to delete it
        if(isset($inv['id']))
        {
            $this->Invoice_payments_model->delete_invoice_pay($id);
            $this->Invoice_payments_model->delete_transaction($inv['inv_id']);
            redirect('Invoice_payments/index');
        }
    }

}
?>