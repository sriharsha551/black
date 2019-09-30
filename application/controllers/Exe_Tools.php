<?php 

    class Exe_Tools extends Admin_Controller
    {
        function __construct()
        {
            parent ::__construct();
            $this->load->model('Exe_Tools_Model');
            $this->page_title->push('Tools & Tackles');
            $this->data['pagetitle'] = $this->page_title->show();
            $this->breadcrumbs->unshift(1, 'Tools & Tackles', 'Exe_Tools/index');
            $this->data['projects'] = $this->Exe_Tools_Model->getProjects();
            $this->data['machinary'] = $this->Exe_Tools_Model->getTools();
        }

        function index()
        {
            $params['limit'] = RECORDS_PER_PAGE; 
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
            
            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('Exe_Tools/index?');
            $config['total_rows'] = $this->Exe_Tools_Model->getCount();
            $this->pagination->initialize($config);
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['tools'] = $this->Exe_Tools_Model->getData();
            $this->template->public_render('Exe_Tools/index', $this->data);   
        }

        function add()
        {
            $this->breadcrumbs->unshift(2, 'Add', 'add');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->load->library('form_validation');
        
            $this->form_validation->set_rules('prj_id','Project','required');
            $this->form_validation->set_rules('tool_id','Tool','required');
            $this->form_validation->set_rules('qty','Quantity','required');

            if($this->form_validation->run())     
            {   
                $params = array(
                    'prj_id'=> $this->input->post('prj_id'),
                    'tool_id'=> $this->input->post('tool_id'),
                    'qty' => $this->input->post('qty')
                );
                // print_r($params);
                $category_id = $this->Exe_Tools_Model->addData($params);
                redirect('Exe_Tools/index');
            } 
            
            else
            {   
                $_SESSION['error'] = true;   
                $this->template->public_render('Exe_Tools/add', $this->data);
            }
        }

        function edit($id)
        {
            $this->breadcrumbs->unshift(2, 'Edit', 'edit');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->load->library('form_validation');
        
            $this->data['tnt'] = $this->Exe_Tools_Model->getDetail($id);
            $this->form_validation->set_rules('prj_id','Project','required');
            $this->form_validation->set_rules('tool_id','Tool','required');
            $this->form_validation->set_rules('qty','Quantity','required');

            if($this->form_validation->run())     
            {   
                $params = array(
                    'prj_id'=> $this->input->post('prj_id'),
                    'tool_id'=> $this->input->post('tool_id'),
                    'qty' => $this->input->post('qty')
                );
                // print_r($params);
                $category_id = $this->Exe_Tools_Model->editData($id,$params);
                redirect('Exe_Tools/index');
            } 
            
            else
            {     
                $this->template->public_render('Exe_Tools/edit', $this->data);
            }
        }

        public function remove($id)
        {
            $inv = $this->Exe_Tools_Model->getDetail($id);
            // check if the stage exists before trying to delete it
            if (isset($inv['id'])) {
                $this->Exe_Tools_Model->deleteData($id);
                redirect('Exe_Tools/index');
            }
        }

    }

?>