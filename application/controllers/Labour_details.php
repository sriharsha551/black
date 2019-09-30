<?php

class Labour_details extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Labour_details_model');

        $this->page_title->push('Labour details');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Labour details', 'Labour_details');
    }

    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Labour_details/index?');
        $this->pagination->initialize($config);
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['labour'] = $this->Labour_details_model->get_all_labour($params);
        $this->template->public_render('Labour_details/index', $this->data);
    }
    function add()
        {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->data['prj'] = $this->Labour_details_model->get_prj_list();
        $this->data['trade'] = $this->Labour_details_model->get_trade();
        $this->form_validation->set_rules('prj_id','Project','required|max_length[255]');
        $this->form_validation->set_rules('trade_id','Trade','required|max_length[255]');
        $this->form_validation->set_rules('general_time','General time','required|max_length[11]');
        $this->form_validation->set_rules('over_time','Over time','required|max_length[11]');
        $this->form_validation->set_rules('date','Date','required|max_length[11]');
		if($this->form_validation->run())     
        {   
            
            $params = $this->input->post();
            $concept_id = $this->Labour_details_model->add_labour($params);
            redirect('Labour_details/index');
        }
        else
        {      
            $this->template->public_render('Labour_details/add', $this->data);      
           
        }
        }
        function edit($id)
        {

        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->data['prj'] = $this->Labour_details_model->get_prj_list();
        $this->data['trade'] = $this->Labour_details_model->get_trade();
        $this->data['labours'] = $this->Labour_details_model->get_labours($id);
        $this->form_validation->set_rules('prj_id','Project','required|max_length[255]');
        $this->form_validation->set_rules('trade_id','Trade','required|max_length[255]');
        $this->form_validation->set_rules('general_time','General time','required|max_length[11]');
        $this->form_validation->set_rules('over_time','Over time','required|max_length[11]');
        $this->form_validation->set_rules('date','Date','required');
		if($this->form_validation->run())     
        {   
            
            $params = $this->input->post();
            $concept_id = $this->Labour_details_model->update_labour($id,$params);
            redirect('Labour_details/index');
        }
        else
        {      
            $this->template->public_render('Labour_details/edit', $this->data);      
           
        }

        }
        function remove($id)
      {
        $lab = $this->Labour_details_model->get_labour_detail($id);
        if (isset($lab['id'])) {
            $this->Labour_details_model->delete($id);
            redirect('Labour_details/index');
        }
      }

}
