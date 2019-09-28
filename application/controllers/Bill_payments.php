<?php 

class Bill_payments extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bill_payments_model');
        
        $this->page_title->push('Bill Payments');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Bill Payments', 'Bill_payments');
    }

    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Bill_payments/index?');
        $config['total_rows'] = $this->Bill_payments_model->get_all_bill_pay_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['bill'] = $this->Bill_payments_model->get_all_bill_pay($params);
        $this->template->public_render('Bill_payments/index',$this->data);
    }

    function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->data['bill_ids'] = $this->Bill_payments_model->get_bill_ids();
        $this->data['coa_ids'] = $this->Bill_payments_model->get_coa_ids();
        $this->data['tran_ids'] = $this->Bill_payments_model->get_tran_ids();
        $this->data['pay_ids'] = $this->Bill_payments_model->get_pay_ids();

        $this->form_validation->set_rules('bill_id','Bill Id','required');
        $this->form_validation->set_rules('coa_id','Coa id','required');
        $this->form_validation->set_rules('paid_dt','Paid Date','required');
        $this->form_validation->set_rules('amount','Amount','required');
        $this->form_validation->set_rules('amount_paid','Amount Paid','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('payment_method','Pay Method','required');
        // $this->form_validation->set_rules('remarks','Remarks','required');
        // $this->form_validation->set_rules('tran_type_id','Transactin type','required');

        if($this->form_validation->run())     
        {   
            $params = $this->input->post();
            if($params['amount_paid]'] < $params['amount'] && $params['amount_paid'] != 0 )
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
            $concept_id = $this->Bill_payments_model->add_bill_pay($params);
            $this->Bill_payments_model->add_transaction($params);
            $this->Bill_payments_model->update_bill($status,$params['bill_id']);
            redirect('Bill_payments/index');
        }
        else
        {
            $this->template->public_render('Bill_payments/add', $this->data);      
        }
    }

    function edit($id)
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['bill'] = $this->Bill_payments_model->get_bill_pay($id);
        $this->data['bill_ids'] = $this->Bill_payments_model->get_bill_ids();
        $this->data['coa_ids'] = $this->Bill_payments_model->get_coa_ids();
        $this->data['tran_ids'] = $this->Bill_payments_model->get_tran_ids();
        $this->data['pay_ids'] = $this->Bill_payments_model->get_pay_ids();

        if(isset($this->data['bill']['id']))
        {
            $this->form_validation->set_rules('bill_id','bill Id','required');
            $this->form_validation->set_rules('coa_id','Coa id','required');
            $this->form_validation->set_rules('paid_dt','Paid Date','required');
            $this->form_validation->set_rules('amount','Amount','required');
            $this->form_validation->set_rules('description','Description','required');
            $this->form_validation->set_rules('payment_method','Payment Method','required');
            // $this->form_validation->set_rules('remarks','Remarks','required');
            // $this->form_validation->set_rules('tran_type_id','Transactin type','required');

            if($this->form_validation->run())     
            {   
                $params = $this->input->post();
                if($params['amount_paid'] < $params['amount'] && $params['amount_paid'] != 0 )
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
                $this->Bill_payments_model->update_bill_pay($id,$params);
                redirect('Bill_payments/index');
            }
            else
            {
                $this->template->public_render('Bill_payments/edit', $this->data); 
            }
        }
        else
        show_error('The bill you are trying to edit does not exist.');
    }

    function remove($id)
    {
        $inv = $this->Bill_payments_model->get_bill_pay($id);
        // check if the stage exists before trying to delete it
        if(isset($inv['id']))
        {
            $this->Bill_payments_model->delete_bill_pay($id);
            redirect('Bill_payments/index');
        }
    }

}
?>