<?php

class Account_types extends Admin_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->model('Account_types_model');
        $this->page_title->push('Account Types');
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Account Types', 'Account_types');
    }

    public function index() 
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Account_types/index?');
        $config['total_rows'] = $this->Account_types_model->get_act_types_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['type_details'] = $this->Account_types_model->get_all_act_types($params);
        $this->template->public_render('Account_types/index', $this->data);
    }

    public function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->form_validation->set_rules('name', 'Type Name', 'required');
        $this->form_validation->set_rules('enabled', 'Enabled', 'required');
        $this->form_validation->set_rules('group_id', 'Group', 'required');
        $this->data['group_list'] = $this->Account_types_model->get_group_list();
        if($this->form_validation->run())
        {
            $this->Account_types_model->add_act_types($this->input->post());
            redirect('Account_types/index');
        }
        else
        {
            $this->template->public_render('Account_types/add', $this->data);
        }
    }

    public function edit($id) 
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->form_validation->set_rules('name', 'Type Name', 'required');
        $this->form_validation->set_rules('enabled', 'Enabled', 'required');
        $this->form_validation->set_rules('group_id', 'Group', 'required');
        $this->data['group_list'] = $this->Account_types_model->get_group_list();

        if($this->form_validation->run())
        {
            $this->Account_types_model->edit_act_types($id, $this->input->post());
            redirect('Account_types/index');
        }
        else
        {
            $this->data['type_detail'] = $this->Account_types_model->get_act_types_detail($id);
            $this->template->public_render('Account_types/edit', $this->data);
        }
    }

    public function remove($id)
    {
        $type = $this->Account_types_model->get_act_types_detail($id);
        $safe_delete = $this->Account_types_model->get_safe_delete($id);
        // check if the Design layout exists before trying to delete it
        if (isset($type['id'])) {
            if($safe_delete)
            {
                $this->Account_types_model->delete_act_types($id);
                redirect('Account_types/index');
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Cant delete item!");';
                echo '</script>';
                redirect('Account_types/index','refresh');
            }
           
        } else {
            show_error('The Account COA you are trying to delete does not exist.');
        }
    }
}

?>