<?php

    class Act_bill_status extends Admin_Controller{
        function __construct(){
            parent :: __construct();

            $this->load->model('Act_bill_status_model');
            $this->page_title->push('Bill Status');
            $this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs :: Common */
            $this->breadcrumbs->unshift(1, 'Bill Status', 'Act_bill_status');
        }

        public function index() {
            $params['limit'] = RECORDS_PER_PAGE; 
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
            
            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('Act_bill_status/index?');
            $config['total_rows'] = $this->Act_bill_status_model->get_count();
            $this->pagination->initialize($config);
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['bill_status'] = $this->Act_bill_status_model->get_all_status();
            $this->template->public_render('Act_bill_status/index', $this->data);
    
        }

        function add()
        {   
            $this->breadcrumbs->unshift(2, 'Add', 'Act_bill_status/add');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name','Name','required|max_length[255]');
            
            if($this->form_validation->run())     
            {   
                $params = array(
                    'name' => $this->input->post('name'),
                );
                $infoCheck = $this->Act_bill_status_model->checkData($params['name']);
                if(!$infoCheck){
                    $status_id = $this->Act_bill_status_model->addDetail($params);
                    redirect('Act_bill_status/index');
                } else{
                    $this->data['err'] = 'The name '.$params['name'].' already in use!!';
                    $this->template->public_render('Act_bill_status/add',$this->data);
                }
            }
            else
            {      
                $this->template->public_render('Act_bill_status/add', $this->data);      
                
            }
        }

        function edit($id)
        {   
            $this->breadcrumbs->unshift(2, 'Edit', 'Act_bill_status/edit');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            // check if the status exists before trying to edit it
            $this->data['status'] = $this->Act_bill_status_model->getDetail($id);
            
            if(isset($this->data['status']['id']))
            {
                $this->load->library('form_validation');

                $this->form_validation->set_rules('name','Name','required|max_length[255]');
            
                if($this->form_validation->run())     
                {   
                    $params = array(
                        'name' => $this->input->post('name'),
                    );
                    $infoCheck = $this->Act_bill_status_model->checkEdit($id,$params['name']);
                    if(!$infoCheck){
                        $this->Act_bill_status_model->editDetail($id,$params);            
                        redirect('Act_bill_status/index');
                    }else{
                        $this->data['err'] = 'The name '.$params['name'].' already in use!!';
                        $this->template->public_render('Act_bill_status/edit',$this->data);
                    }
                }
                else
                {
                    $this->template->public_render('Act_bill_status/edit', $this->data); 
                }
            }
            else
                show_error('The status you are trying to edit does not exist.');
        }

        function remove($id)
        {
            $status = $this->Act_bill_status_model->getDetail($id);

            // check if the status exists before trying to delete it
            if(isset($status['id']))
            {
                $this->Act_bill_status_model->deleteDetail($id);
                redirect('Act_bill_status/index');
            }
            else
                show_error('The status you are trying to delete does not exist.');
        }
    
    }

?>