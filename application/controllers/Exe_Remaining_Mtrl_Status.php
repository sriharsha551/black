<?php

    class Exe_Remaining_Mtrl_Status extends Admin_Controller 
    {
        function __construct()
        {
            parent ::__construct();
            $this->load->model('Exe_Remaining_Mtrl_Status_Model');
            $this->page_title->push('Remaining Material Status');
            $this->data['pagetitle'] = $this->page_title->show();
            $this->breadcrumbs->unshift(1, 'Remaining Material Status', 'Exe_Remaining_Mtrl_Status/index');
            $this->data['items'] = $this->Exe_Remaining_Mtrl_Status_Model->getMaterials();
            $this->data['projects'] = $this->Exe_Remaining_Mtrl_Status_Model->getProjects();
            $this->data['purchases'] = $this->Exe_Remaining_Mtrl_Status_Model->getPO();    
        }

        function index()
        {
            $params['limit'] = RECORDS_PER_PAGE; 
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
            
            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('Exe_Remaining_Mtrl_Status/index?');
            $config['total_rows'] = $this->Exe_Remaining_Mtrl_Status_Model->getCount();
            $this->pagination->initialize($config);
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['mtrl_status'] = $this->Exe_Remaining_Mtrl_Status_Model->getData();
            $this->template->public_render('Exe_Remaining_Mtrl_Status/index', $this->data);   
        }

        function add()
        {
            $this->breadcrumbs->unshift(2, 'Add', 'add');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->load->library('form_validation');
        
            $this->form_validation->set_rules('prj_id','Project','required');
            $this->form_validation->set_rules('mtrl_id','Material','required');
            $this->form_validation->set_rules('qty_order','Quantity','required');
            $this->form_validation->set_rules('order_date','Ordered Date','required');
            $this->form_validation->set_rules('qty_recived','Quantity Recived','required');
            $this->form_validation->set_rules('recived_date','Recived Date','required');
            $this->form_validation->set_rules('qty_utilised','Utilized quantity','required');
            $this->form_validation->set_rules('utl_date','Utilized Date','required');


            if($this->form_validation->run())     
            {   
                $params = array(
                    'prj_id'=> $this->input->post('prj_id'),
                    'material_id'=> $this->input->post('mtrl_id'),
                    'qty_order'=> $this->input->post('qty_order'),
                    'order_date'=> $this->input->post('order_date'),
                    'qty_recived' => $this->input->post('qty_recived'),
                    'recived_date' => $this->input->post('recived_date'),
                    'qty_utilised' => $this->input->post('qty_utilised'),
                    'utl_date' => $this->input->post('utl_date')
                );
                $category_id = $this->Exe_Remaining_Mtrl_Status_Model->addData($params);
                redirect('Exe_Remaining_Mtrl_Status/index');
            } 
            
            else
            {   
                $_SESSION['error'] = true;
                $this->template->public_render('Exe_Remaining_Mtrl_Status/add', $this->data);
            }
        }

        function edit($id)
        {
            $this->breadcrumbs->unshift(2, 'Edit', 'edit');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['mtrl_stat'] = $this->Exe_Remaining_Mtrl_Status_Model->getDetail($id);
            print_r($this->data['mtrl_stat']);
            // print_r($this->data['items']);
            if (isset($this->data['mtrl_stat']['id'])) {
                $this->form_validation->set_rules('prj_id','Project','required');
                $this->form_validation->set_rules('mtrl_id','Material','required');
                $this->form_validation->set_rules('qty_order','Quantity','required');
                $this->form_validation->set_rules('order_date','Ordered Date','required');
                $this->form_validation->set_rules('qty_recived','Quantity Recived','required');
                $this->form_validation->set_rules('recived_date','Recived Date','required');
                $this->form_validation->set_rules('qty_utilised','Utilized quantity','required');
                $this->form_validation->set_rules('utl_date','Utilized Date','required');
    
                if ($this->form_validation->run()) {
                    $params = array(
                        'prj_id'=> $this->input->post('prj_id'),
                        'material_id'=> $this->input->post('mtrl_id'),
                        'qty_order'=> $this->input->post('qty_order'),
                        'order_date'=> $this->input->post('order_date'),
                        'qty_recived' => $this->input->post('qty_recived'),
                        'recived_date' => $this->input->post('recived_date'),
                        'qty_utilised' => $this->input->post('qty_utilised'),
                        'utl_date' => $this->input->post('utl_date')
                    );
                    // print_r($params);
                    $this->Exe_Remaining_Mtrl_Status_Model->editData($id, $params);
                    redirect('Exe_Remaining_Mtrl_Status/index');
                } else {
                    $_SESSION['edit_error'] = true;
                    $this->template->public_render('Exe_Remaining_Mtrl_Status/edit', $this->data);
                }
            } else {
                show_error('The data you are trying to edit does not exist.');
            }
        }

        function remove($id)
        {
            $inv = $this->Exe_Remaining_Mtrl_Status_Model->getDetail($id);
            // check if the stage exists before trying to delete it
            // print_r($inv);
            if (isset($inv['id'])) {
                $this->Exe_Remaining_Mtrl_Status_Model->deleteData($id);
                redirect('Exe_Remaining_Mtrl_Status/index');
            }
            else
                show_error('The status you are trying to delete does not exist.');
        }
    }

?>