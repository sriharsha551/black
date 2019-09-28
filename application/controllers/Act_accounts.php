<?php

    class Act_accounts extends Admin_Controller{
        function __construct(){
            parent :: __construct();

            $this->load->model('Act_accounts_model');
            $this->page_title->push('Accounts');
            $this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs :: Common */
            $this->breadcrumbs->unshift(1, 'Accounts', 'Act_accounts');
            $this->data['coa_id'] = $this->Act_accounts_model->get_coa();
        }

        public function index() {
            $params['limit'] = RECORDS_PER_PAGE; 
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('Act_accounts/index?');
            $config['total_rows'] = $this->Act_accounts_model->get_count();
            $this->pagination->initialize($config);
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['taxes'] = $this->Act_accounts_model->get_all_accounts();
            for($d=0;$d<count($this->data['taxes']);$d++)
            {
                $this->data['balance'][$d] = $this->Act_accounts_model->get_balance($this->data['taxes'][$d]['id']);
            }
            // print_r($this->data['balance']);
            $this->template->public_render('Act_accounts/index', $this->data);
    
        }

        function add()
        {   
            $this->breadcrumbs->unshift(2, 'Add', 'Act_accounts/add');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->load->library('form_validation');

            
            $this->form_validation->set_rules('coa_id','COA','required');
            $this->form_validation->set_rules('name','Name','required|max_length[255]');
            $this->form_validation->set_rules('bank_name','Bank Name','required');
            $this->form_validation->set_rules('opening_balance','Opening Balance','required');
            $this->form_validation->set_rules('bank_address','Bank Address','required');
            
            if($this->form_validation->run())     
            {   
                $params = array(
                    'coa_id' => $this->input->post('coa_id'),
                    'acc_name' => $this->input->post('name'),
                    'bank_name' => $this->input->post('bank_name'),
                    'opening_balance' => $this->input->post('opening_balance'),
                    'bank_address' => $this->input->post('bank_address')
                );
                $infoCheck = $this->Act_accounts_model->checkData($params['acc_name']);
                if(!$infoCheck){
                    $status_id = $this->Act_accounts_model->addDetail($params);
                    redirect('Act_accounts/index');
                } else{
                    $this->data['err'] = 'The name '.$params['acc_name'].' already in use!!';
                    $this->template->public_render('Act_accounts/add',$this->data);
                }
            }
            else
            {      
                $this->template->public_render('Act_accounts/add', $this->data);      
                
            }
        }

        function edit($id)
        {   
            $this->breadcrumbs->unshift(2, 'Edit', 'Act_accounts/edit');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            // check if the status exists before trying to edit it
            $this->data['status'] = $this->Act_accounts_model->getDetail($id);
            $this->data['coa_id'] = $this->Act_accounts_model->get_coa();
            if(isset($this->data['status']['id']))
            {
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('coa_id','COA','required');
                $this->form_validation->set_rules('acc_name','Name','required');
                $this->form_validation->set_rules('bank_name','Bank Name','required');
                $this->form_validation->set_rules('opening_balance','Opening Balance','required');
                $this->form_validation->set_rules('bank_address','Bank Address','required');
                // print_r($this->input->post());

                if($this->form_validation->run())     
                {   
                    $params = array(
                        'coa_id' => $this->input->post('coa_id'),
                        'acc_name' => $this->input->post('acc_name'),
                        'bank_name' => $this->input->post('bank_name'),
                        'opening_balance' => $this->input->post('opening_balance'),
                        'bank_address' => $this->input->post('bank_address')
                    );
                    
                    $infoCheck = $this->Act_accounts_model->checkEdit($id,$params['name']);
                    if(!$infoCheck){
                        $this->Act_accounts_model->editDetail($id,$params);            
                        redirect('Act_accounts/index');
                    }else{
                        $this->data['err'] = 'The name '.$params['name'].' already in use!!';
                        $this->template->public_render('Act_accounts/edit',$this->data);
                    }
                }
                else
                {
                    $this->template->public_render('Act_accounts/edit', $this->data); 
                }
            }
            else
                show_error('The status you are trying to edit does not exist.');
        }

        function remove($id)
        {
            $status = $this->Act_accounts_model->getDetail($id);

            // check if the status exists before trying to delete it
            if(isset($status['id']))
            {
                $this->Act_accounts_model->deleteDetail($id);
                redirect('Act_accounts/index');
            }
            else
                show_error('The status you are trying to delete does not exist.');
                
        }
    
    }

?>