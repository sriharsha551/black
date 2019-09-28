<?php

class Account_payment_method extends Admin_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->model('Account_payment_method_model');
        $this->page_title->push('Payment Methods');
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Payment Methods', 'Account_payment_method');
    }

    public function index() 
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Account_payment_method/index?');
        $config['total_rows'] = $this->Account_payment_method_model->get_payment_method_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['method_details'] = $this->Account_payment_method_model->get_all_payment_methods($params);
        $this->template->public_render('Account_payment_method/index', $this->data);
    }

    public function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->form_validation->set_rules('name', 'Method Name', 'required');

        if($this->form_validation->run())
        {
            $this->Account_payment_method_model->add_payment_method($this->input->post());
            redirect('Account_payment_method/index');
        }
        else
        {
            $this->template->public_render('Account_payment_method/add', $this->data);
        }
    }

    public function edit($id) 
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->form_validation->set_rules('name', 'Method Name', 'required');

        if($this->form_validation->run())
        {
            $this->Account_payment_method_model->edit_payment_method($id, $this->input->post());
            redirect('Account_payment_method/index');
        }
        else
        {
            $this->data['method_detail'] = $this->Account_payment_method_model->get_payment_method_detail($id);
            $this->template->public_render('Account_payment_method/edit', $this->data);
        }
    }

    public function remove($id)
    {
        $type = $this->Account_payment_method_model->get_payment_method_detail($id);

        // check if the Design layout exists before trying to delete it
        if (isset($type['id'])) {
            $this->Account_payment_method_model->delete_payment_method($id);
            redirect('Account_payment_method/index');
        } else {
            show_error('The Payment Method you are trying to delete does not exist.');
        }
    }
}

?>