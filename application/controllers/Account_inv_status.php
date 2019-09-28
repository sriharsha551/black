<?php

class Account_inv_status extends Admin_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->model('Account_inv_status_model');
        $this->page_title->push('Invoice Status');
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Invoice Status', 'Account_inv_status');
    }

    public function index() 
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Account_inv_status/index?');
        $config['total_rows'] = $this->Account_inv_status_model->get_invoice_status_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['status_details'] = $this->Account_inv_status_model->get_all_invoice_statuses($params);
        $this->template->public_render('Account_inv_status/index', $this->data);
    }

    public function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->form_validation->set_rules('name', 'Status Name', 'required');

        if($this->form_validation->run())
        {
            $this->Account_inv_status_model->add_invoice_status($this->input->post());
            redirect('Account_inv_status/index');
        }
        else
        {
            $this->template->public_render('Account_inv_status/add', $this->data);
        }
    }

    public function edit($id) 
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->form_validation->set_rules('name', 'Status Name', 'required');

        if($this->form_validation->run())
        {
            $this->Account_inv_status_model->edit_invoice_status($id, $this->input->post());
            redirect('Account_inv_status/index');
        }
        else
        {
            $this->data['status_detail'] = $this->Account_inv_status_model->get_invoice_status_detail($id);
            $this->template->public_render('Account_inv_status/edit', $this->data);
        }
    }

    public function remove($id)
    {
        $type = $this->Account_inv_status_model->get_invoice_status_detail($id);

        // check if the Design layout exists before trying to delete it
        if (isset($type['id'])) {
            $this->Account_inv_status_model->delete_invoice_status($id);
            redirect('Account_inv_status/index');
        } else {
            show_error('The Status type you are trying to delete does not exist.');
        }
    }
}

?>