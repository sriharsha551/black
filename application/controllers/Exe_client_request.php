<?php 

class Exe_client_request extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Exe_client_request_model');
        
        $this->page_title->push('Execution Client Request');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Execution Client Request', 'Exe_client_request');
    }

    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Exe_client_request/index?');
        $config['total_rows'] = $this->Exe_client_request_model->get_all_request_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['requests'] = $this->Exe_client_request_model->get_all_request($params);
        $this->template->public_render('Exe_client_request/index',$this->data);
    }

    function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->data['prj_ids'] = $this->Exe_client_request_model->get_prj_ids();
        $this->data['material_ids'] = $this->Exe_client_request_model->get_material_ids();
        $this->form_validation->set_rules('prj_id','Project Id','required');
        $this->form_validation->set_rules('date_req','Date req','required');
        $this->form_validation->set_rules('material_id','Material','required');
        $this->form_validation->set_rules('quantity','Quantity','required');

        if($this->form_validation->run())     
        {   
            $params = $this->input->post();
            $concept_id = $this->Exe_client_request_model->add_request($params);
            redirect('Exe_client_request/index');
        }
        else
        {
            $this->template->public_render('Exe_client_request/add', $this->data);      
        }
    }

    function edit($id)
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['request'] = $this->Exe_client_request_model->get_request($id);
        $this->data['prj_ids'] = $this->Exe_client_request_model->get_prj_ids();
        $this->data['material_ids'] = $this->Exe_client_request_model->get_material_ids();

        if(isset($this->data['request']['id']))
        {
            $this->form_validation->set_rules('prj_id','Project Id','required');
        $this->form_validation->set_rules('date_req','Date ','required');
        $this->form_validation->set_rules('material_id','Material','required');
        $this->form_validation->set_rules('quantity','Quantity','required');

            if($this->form_validation->run())     
            {   
                $params = $this->input->post();
                $this->Exe_client_request_model->update_request($id,$params);
                redirect('Exe_client_request/index');
            }
            else
            {
                $this->template->public_render('Exe_client_request/edit', $this->data); 
            }
        }
        else
        show_error('The bill you are trying to edit does not exist.');
    }

    function remove($id)
    {
        $inv = $this->Exe_client_request_model->get_request($id);
        // check if the stage exists before trying to delete it
        if(isset($inv['id']))
        {
            $this->Exe_client_request_model->delete_request($id);
            redirect('Exe_client_request/index');
        }
    }

}
?>