<?php

class Account_trans_type extends Admin_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->model('Account_trans_type_model');
        $this->page_title->push('Transaction Types');
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Transaction Types', 'Account_trans_type');
    }

    public function index() 
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Account_trans_type/index?');
        $config['total_rows'] = $this->Account_trans_type_model->get_trans_type_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['trans_types'] = $this->Account_trans_type_model->get_all_trans_types($params);
        $this->template->public_render('Account_trans_type/index', $this->data);
    }

    public function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->form_validation->set_rules('trans_type', 'Transaction Type', 'required');

        if($this->form_validation->run())
        {
            $this->Account_trans_type_model->add_trans_type($this->input->post());
            redirect('Account_trans_type/index');
        }
        else
        {
            $this->template->public_render('Account_trans_type/add', $this->data);
        }
    }

    public function edit($id) 
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->form_validation->set_rules('trans_type', 'Transaction Type', 'required');

        if($this->form_validation->run())
        {
            $this->Account_trans_type_model->edit_trans_type($id, $this->input->post());
            redirect('Account_trans_type/index');
        }
        else
        {
            $this->data['type'] = $this->Account_trans_type_model->get_trans_type_detail($id);
            $this->template->public_render('Account_trans_type/edit', $this->data);
        }
    }

    public function remove($id)
    {
        $type = $this->Account_trans_type_model->get_trans_type_detail($id);

        // check if the Design layout exists before trying to delete it
        if (isset($type['id'])) {
            $this->Account_trans_type_model->delete_trans_type($id);
            redirect('Account_trans_type/index');
        } else {
            show_error('The Transaction type you are trying to delete does not exist.');
        }
    }
}

?>