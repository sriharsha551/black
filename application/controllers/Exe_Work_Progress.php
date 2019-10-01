<?php 

    class Exe_Work_Progress extends Admin_Controller
    {
        function __construct()
        {
            parent ::__construct();
            $this->load->model('Exe_Work_Progress_Model');
            $this->page_title->push('Work Progress');
            $this->data['pagetitle'] = $this->page_title->show();
            $this->breadcrumbs->unshift(1, 'Work Progress', 'Exe_Work_Progress/index');
            $this->data['projects'] = $this->Exe_Work_Progress_Model->getProjects();
            $this->data['trades'] = $this->Exe_Work_Progress_Model->getTrades();
            $this->data['areas'] = $this->Exe_Work_Progress_Model->getAreas();
        }

        function index()
        {
            $params['limit'] = RECORDS_PER_PAGE; 
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
            
            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('Exe_Work_Progress/index?');
            $config['total_rows'] = $this->Exe_Work_Progress_Model->getCount();
            $this->pagination->initialize($config);
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['requests'] = $this->Exe_Work_Progress_Model->getData();
            $this->template->public_render('Exe_Work_Progress/index', $this->data);   
        }

        function add()
        {
            $this->breadcrumbs->unshift(2, 'Add', 'add');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->load->library('form_validation');
        
            $this->form_validation->set_rules('prj_id','Project','required');
            $this->form_validation->set_rules('trade_id','Trade','required');
            $this->form_validation->set_rules('area_id','Area','required');
            $this->form_validation->set_rules('date','Date','required');
            $this->form_validation->set_rules('work_description','Work Description','required');

            if($this->form_validation->run())     
            {   
                $params = array(
                    'prj_id'=> $this->input->post('prj_id'),
                    'trade_id'=> $this->input->post('trade_id'),
                    'date'=> $this->input->post('date'),
                    'area_id'=> $this->input->post('area_id'),
                    'work_description' => $this->input->post('work_description')
                );
                $category_id = $this->Exe_Work_Progress_Model->addData($params);
                redirect('Exe_Work_Progress/index');
            } 
            
            else
            {   
                $this->template->public_render('Exe_Work_Progress/add', $this->data);
            }
        }

        function edit($id)
        {
            $this->breadcrumbs->unshift(2, 'Edit', 'edit');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->load->library('form_validation');
        
            $this->data['req'] = $this->Exe_Work_Progress_Model->getDetail($id);
            $this->form_validation->set_rules('prj_id','Project','required');
            $this->form_validation->set_rules('trade_id','Trade','required');
            $this->form_validation->set_rules('area_id','Area','required');
            $this->form_validation->set_rules('date','Date','required');
            $this->form_validation->set_rules('work_description','Work Description','required');

            if($this->form_validation->run())     
            {   
                $params = array(
                    'prj_id'=> $this->input->post('prj_id'),
                    'trade_id'=> $this->input->post('trade_id'),
                    'date'=> $this->input->post('date'),
                    'area_id'=> $this->input->post('area_id'),
                    'work_description' => $this->input->post('work_description')
                );
                
                $category_id = $this->Exe_Work_Progress_Model->editData($id,$params);
                redirect('Exe_Work_Progress/index');
            } 
            
            else
            {     
                print_r($this->input->post());
                $this->template->public_render('Exe_Work_Progress/edit', $this->data);
            }
        }

        public function remove($id)
        {
            $inv = $this->Exe_Work_Progress_Model->getDetail($id);
            // check if the stage exists before trying to delete it
            if (isset($inv['id'])) {
                $this->Exe_Work_Progress_Model->deleteData($id);
                redirect('Exe_Work_Progress/index');
            }
        }

    }

?>