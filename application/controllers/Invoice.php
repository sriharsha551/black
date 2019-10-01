<?php

class Invoice extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_model');

        $this->page_title->push('Invoices');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Invoices', 'Invoice');
    }

    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Invoice/index?');
        $config['total_rows'] = $this->Invoice_model->get_all_invoice_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['invoice'] = $this->Invoice_model->get_all_Invoice($params);
        $this->template->public_render('Invoice/index', $this->data);
    }

    public function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['Customers'] = $this->Invoice_model->get_cut();
        $this->data['credit'] = $this->Invoice_model->get_credit();
        $this->data['tax'] = $this->Invoice_model->get_tax();
        $this->data['invoice_item'] = $this->Invoice_model->get_Invoice_items();
        $this->data['inv_status'] = $this->Invoice_model->get_inv_status();
        $this->data['order_num'] = $this->Invoice_model->get_order();
        $this->data['prj_list'] = $this->Invoice_model->get_all_prj_list();
        $this->load->library('form_validation');

   
        $this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
        $this->form_validation->set_rules('customer_email', 'Customer Email', 'required');
        $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'required');
        $this->form_validation->set_rules('customer_address', 'Customer Address', 'required');
        $this->form_validation->set_rules('invoice_date', 'Invoice Date', 'required');
        $this->form_validation->set_rules('invoice_num', 'Invoice Number', 'required');
        $this->form_validation->set_rules('order_num', 'Order Number', 'required');
        $this->form_validation->set_rules('invoice_status', 'Invoice Status', 'required');
        $this->form_validation->set_rules('invoice_item', 'Invoice Item', 'required');
        $this->form_validation->set_rules('cr_days_id', 'Credit Days', 'required');
        // $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('tax_id', 'Tax Id', 'required');
        $this->form_validation->set_rules('tax_amount', 'Tax Amount', 'required');
        $this->form_validation->set_rules('total_amount', 'Total Amount', 'required');
        // $this->form_validation->set_rules('remarks', 'Remarks', 'required');

       

        if ($this->form_validation->run()) {
            $params = $this->input->post();
            $concept_id = $this->Invoice_model->add_invoice($params);
            redirect('Invoice/index');
        } else {
            $_SESSION['error'] = true;
            $this->template->public_render('Invoice/add', $this->data);
        }
    }

    public function edit($id)
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['invoices'] = $this->Invoice_model->get_invoice($id);
        $this->data['Customers'] = $this->Invoice_model->get_cut();
        $this->data['credit'] = $this->Invoice_model->get_credit();
        $this->data['tax'] = $this->Invoice_model->get_tax();
        $this->data['invoice_item'] = $this->Invoice_model->get_invoice_items();
        $this->data['invoice_status'] = $this->Invoice_model->get_inv_status();
        $this->data['order_num'] = $this->Invoice_model->get_order();
        $this->data['prj_list'] = $this->Invoice_model->get_all_prj_list();
        $this->load->library('form_validation');

        if (isset($this->data['invoices']['id'])) {
        
            $this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
            $this->form_validation->set_rules('customer_email', 'Customer Email', 'required');
            $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'required');
            $this->form_validation->set_rules('customer_address', 'Customer Address', 'required');
            $this->form_validation->set_rules('invoice_date', 'Invoice Date', 'required');
            $this->form_validation->set_rules('invoice_num', 'Invoice Number', 'required');
            $this->form_validation->set_rules('order_num', 'Order Number', 'required');
            $this->form_validation->set_rules('invoice_status', 'Invoice Status', 'required');
            $this->form_validation->set_rules('cr_days_id', 'Credit Days', 'required');
            // $this->form_validation->set_rules('quantity', 'Quantity', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_rules('tax_id', 'Tax Id', 'required');
            $this->form_validation->set_rules('tax_amount', 'Tax Amount', 'required');
            $this->form_validation->set_rules('total_amount', 'Total Amount', 'required');
            // $this->form_validation->set_rules('remarks', 'Remarks', 'required');
            if ($this->form_validation->run()) {
                $params = $this->input->post();
                $this->Invoice_model->update($id, $params);
                redirect('Invoice/index');
            } else {
                $_SESSION['edit_error'] = true;
                $this->template->public_render('Invoice/edit', $this->data);
            }
        } else {
            show_error('The bills you are trying to edit does not exist.');
        }

    }

    public function invoice_view($id) 
    {
        $this->breadcrumbs->unshift(2, 'Invoice', 'invoice_view');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['prj_list'] = $this->Invoice_model->get_all_prj_list();


        $this->data['invoices'] = $this->Invoice_model->get_invoice($id);
        $this->data['Customers'] = $this->Invoice_model->get_cut();
        $this->data['credit'] = $this->Invoice_model->get_credit();
        $this->data['tax'] = $this->Invoice_model->get_tax();
        $this->data['invoice_item'] = $this->Invoice_model->get_invoice_items();
        $this->data['invoice_status'] = $this->Invoice_model->get_inv_status();
        $this->data['order_num'] = $this->Invoice_model->get_order();
        $this->template->public_render('Invoice/invoice_view', $this->data);

    }

    public function delete($id) 
    {
        $inv = $this->Invoice_model->get_invoice_detail($id);
        if (isset($inv['id'])) {
        $this->Invoice_model->delete($id);
        redirect("Invoice/");
        }
    }

}
