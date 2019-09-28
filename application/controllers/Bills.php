<?php

class Bills extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bills_model');

        $this->page_title->push('Bills');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Bills', 'Bills');
    }

    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Bills/index?');
        $config['total_rows'] = $this->Bills_model->get_all_bills_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['bills'] = $this->Bills_model->get_all_bills($params);
        $this->template->public_render('Bills/index', $this->data);
    }

    public function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['suppliers'] = $this->Bills_model->get_sup();
        $this->data['credit'] = $this->Bills_model->get_credit();
        $this->data['tax'] = $this->Bills_model->get_tax();
        $this->data['bill_item'] = $this->Bills_model->get_bill_items();
        $this->data['bill_status'] = $this->Bills_model->get_bill_status();
        $this->data['order_num'] = $this->Bills_model->get_order();

        $this->load->library('form_validation');

        // $this->form_validation->set_rules('sup_id', 'Supplier Id', 'required');
        $this->form_validation->set_rules('sup_name', 'Supplier Name', 'required');
        $this->form_validation->set_rules('sup_email', 'Supplier Email', 'required');
        $this->form_validation->set_rules('sup_phone', 'Supplier Phone', 'required');
        $this->form_validation->set_rules('sup_address', 'Supplier Address', 'required');
        $this->form_validation->set_rules('bill_num', 'Bill Number', 'required');
        $this->form_validation->set_rules('order_num', 'Order Number', 'required');
        // $this->form_validation->set_rules('remarks', 'Remarks', 'required');
        $this->form_validation->set_rules('bill_status', 'Bill Status', 'required');
        $this->form_validation->set_rules('bill_date', 'Bill Date', 'required');
        $this->form_validation->set_rules('cr_days_id', 'Credit Days', 'required');
        // $this->form_validation->set_rules('bill_item', 'Bill Item', 'required');
        $this->form_validation->set_rules('total_amt', 'Total Amt', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('tax_id', 'Tax Id', 'required');
        $this->form_validation->set_rules('tax_amt', 'Tax Amount', 'required');

        if ($this->form_validation->run()) {
            $params = $this->input->post();
            print_r($params);
            $concept_id = $this->Bills_model->add_bill($params);
            redirect('Bills/index');
        } else {
            $_SESSION['error'] = true;
            $this->template->public_render('Bills/add', $this->data);
        }
    }

    public function edit($id)
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['bills'] = $this->Bills_model->get_bills($id);
        $this->data['suppliers'] = $this->Bills_model->get_sup();
        $this->data['credit'] = $this->Bills_model->get_credit();
        $this->data['tax'] = $this->Bills_model->get_tax();
        $this->data['bill_item'] = $this->Bills_model->get_bill_items();
        $this->data['bill_status'] = $this->Bills_model->get_bill_status();
        $this->data['order_num'] = $this->Bills_model->get_order();

        if (isset($this->data['bills']['id'])) {
            $this->form_validation->set_rules('sup_id', 'Supplier Id', 'required');
            $this->form_validation->set_rules('sup_name', 'Supplier Name', 'required');
            $this->form_validation->set_rules('sup_email', 'Supplier Email', 'required');
            $this->form_validation->set_rules('sup_phone', 'Supplier Phone', 'required');
            $this->form_validation->set_rules('sup_address', 'Supplier Address', 'required');
            $this->form_validation->set_rules('bill_num', 'Bill Number', 'required');
            // $this->form_validation->set_rules('remarks', 'Remarks', 'required');
            $this->form_validation->set_rules('bill_status', 'Bill Status', 'required');
            $this->form_validation->set_rules('bill_date', 'Bill Date', 'required');
            $this->form_validation->set_rules('cr_days_id', 'Credit Days', 'required');
            // $this->form_validation->set_rules('bill_item', 'Bill Item', 'required');
            $this->form_validation->set_rules('total_amt', 'Total Amt', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_rules('tax_id', 'Tax Id', 'required');
            $this->form_validation->set_rules('tax_amt', 'Tax Amount', 'required');

            if ($this->form_validation->run()) {
                $params = $this->input->post();
                $this->Bills_model->update_bills($id, $params);
                redirect('Bills/index');
            } else {
                $_SESSION['edit_error'] = true;
                $this->template->public_render('Bills/edit', $this->data);
            }
        } else {
            show_error('The bills you are trying to edit does not exist.');
        }

    }

    public function bills_view($id) 
    {
        $this->breadcrumbs->unshift(2, 'Bills', 'bills_view');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['bills'] = $this->Bills_model->get_bills($id);
        $this->data['suppliers'] = $this->Bills_model->get_sup();
        $this->data['credit'] = $this->Bills_model->get_credit();
        $this->data['tax'] = $this->Bills_model->get_tax();
        $this->data['bill_item'] = $this->Bills_model->get_bill_items();
        $this->data['bill_status'] = $this->Bills_model->get_bill_status();
        $this->data['order_num'] = $this->Bills_model->get_order();
        $this->template->public_render('Bills/bills_view', $this->data);

    }

    public function remove($id)
    {
        $inv = $this->Bills_model->get_bills($id);
        // check if the stage exists before trying to delete it
        if (isset($inv['id'])) {
            $this->Bills_model->delete_bills($id);
            redirect('Bills/index');
        }
    }

}
