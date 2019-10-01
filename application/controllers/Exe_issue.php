<?php 

class Exe_issue extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Exe_issue_model');
        
        $this->page_title->push('Execution Issue');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Execution Issue', 'Exe_issue');
    }

    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Exe_issue/index?');
        $config['total_rows'] = $this->Exe_issue_model->get_all_issue_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['issues'] = $this->Exe_issue_model->get_all_issue($params);
        $this->template->public_render('Exe_issue/index',$this->data);
    }

    function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->data['prj_ids'] = $this->Exe_issue_model->get_prj_ids();
        $this->data['area_ids'] = $this->Exe_issue_model->get_area_ids();
        $this->form_validation->set_rules('prj_id','Project Id','required');
        $this->form_validation->set_rules('date','Date','required');
        $this->form_validation->set_rules('area_id','Area','required');
        $this->form_validation->set_rules('work_desc','Work Description','required');

        if($this->form_validation->run())     
        {   
            $params = $this->input->post();
            $concept_id = $this->Exe_issue_model->add_issue($params);
            redirect('Exe_issue/index');
        }
        else
        {
            $this->template->public_render('Exe_issue/add', $this->data);      
        }
    }

    function edit($id)
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['issue'] = $this->Exe_issue_model->get_issue($id);
        $this->data['prj_ids'] = $this->Exe_issue_model->get_prj_ids();
        $this->data['area_ids'] = $this->Exe_issue_model->get_area_ids();

        if(isset($this->data['issue']['id']))
        {
            $this->form_validation->set_rules('prj_id','Project Id','required');
        $this->form_validation->set_rules('date','Date','required');
        $this->form_validation->set_rules('area_id','Area','required');
        $this->form_validation->set_rules('work_desc','Work Description','required');

            if($this->form_validation->run())     
            {   
                $params = $this->input->post();
                $this->Exe_issue_model->update_issue($id,$params);
                redirect('Exe_issue/index');
            }
            else
            {
                $this->template->public_render('Exe_issue/edit', $this->data); 
            }
        }
        else
        show_error('The bill you are trying to edit does not exist.');
    }

    function remove($id)
    {
        $inv = $this->Exe_issue_model->get_issue($id);
        // check if the stage exists before trying to delete it
        if(isset($inv['id']))
        {
            $this->Exe_issue_model->delete_issue($id);
            redirect('Exe_issue/index');
        }
    }

}
?>