<?php 

    class Exe_Mtrl_Request extends Admin_Controller
    {
        function __construct()
        {
            parent ::__construct();
            $this->load->model('Exe_Mtrl_Request_Model');
            $this->page_title->push('Material Request');
            $this->data['pagetitle'] = $this->page_title->show();
            $this->breadcrumbs->unshift(1, 'Material Request', 'Exe_Mtrl_Request/index');
            $this->data['projects'] = $this->Exe_Mtrl_Request_Model->getProjects();
            $this->data['materials'] = $this->Exe_Mtrl_Request_Model->getMaterials();
        }

        function index()
        {
            $params['limit'] = RECORDS_PER_PAGE; 
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
            
            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('Exe_Mtrl_Request/index?');
            $config['total_rows'] = $this->Exe_Mtrl_Request_Model->getCount();
            $this->pagination->initialize($config);
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['requests'] = $this->Exe_Mtrl_Request_Model->getData();
            $this->template->public_render('Exe_Mtrl_Request/index', $this->data);   
        }

        function add()
        {
            $this->breadcrumbs->unshift(2, 'Add', 'add');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->load->library('form_validation');
        
            $this->form_validation->set_rules('prj_id','Project','required');
            $this->form_validation->set_rules('mtrl_id','Material','required');
            $this->form_validation->set_rules('qty','Quantity','required');

            if($this->form_validation->run())     
            {   
                $params = array(
                    'prj_id'=> $this->input->post('prj_id'),
                    'mtrl_id'=> $this->input->post('mtrl_id'),
                    'qty' => $this->input->post('qty')
                );
                // print_r($params);
                $category_id = $this->Exe_Mtrl_Request_Model->addData($params);
                redirect('Exe_Mtrl_Request/index');
            } 
            
            else
            {   
                $_SESSION['error'] = true;   
                $this->template->public_render('Exe_Mtrl_Request/add', $this->data);
            }
        }

        function edit($id)
        {
            $this->breadcrumbs->unshift(2, 'Edit', 'edit');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->load->library('form_validation');
        
            $this->data['req'] = $this->Exe_Mtrl_Request_Model->getDetail($id);
            $this->form_validation->set_rules('prj_id','Project','required');
            $this->form_validation->set_rules('mtrl_id','Material','required');
            $this->form_validation->set_rules('qty','Quantity','required');

            if($this->form_validation->run())     
            {   
                $params = array(
                    'prj_id'=> $this->input->post('prj_id'),
                    'mtrl_id'=> $this->input->post('mtrl_id'),
                    'qty' => $this->input->post('qty')
                );
                // print_r($params);
                $category_id = $this->Exe_Mtrl_Request_Model->editData($id,$params);
                redirect('Exe_Mtrl_Request/index');
            } 
            
            else
            {     
                $this->template->public_render('Exe_Mtrl_Request/edit', $this->data);
            }
        }

        public function remove($id)
        {
            $inv = $this->Exe_Mtrl_Request_Model->getDetail($id);
            // check if the stage exists before trying to delete it
            if (isset($inv['id'])) {
                $this->Exe_Mtrl_Request_Model->deleteData($id);
                redirect('Exe_Mtrl_Request/index');
            }
        }

    }

?>