<?php 

class Exe_nextday_schedule extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Exe_nextday_schedule_model');
        
        $this->page_title->push('Execution NextDay Schedule');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Execution NextDay Schedule', 'Exe_nextday_schedule');
    }

    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Exe_nextday_schedule/index?');
        $config['total_rows'] = $this->Exe_nextday_schedule_model->get_all_schedule_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['schedules'] = $this->Exe_nextday_schedule_model->get_all_schedule($params);
        $this->template->public_render('Exe_nextday_schedule/index',$this->data);
    }

    function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->data['prj_ids'] = $this->Exe_nextday_schedule_model->get_prj_ids();
        $this->data['trade_ids'] = $this->Exe_nextday_schedule_model->get_trade_ids();
        $this->data['area_ids'] = $this->Exe_nextday_schedule_model->get_area_ids();
        $this->form_validation->set_rules('prj_id','Project Id','required');
        $this->form_validation->set_rules('trade_id','Trade id','required');
        $this->form_validation->set_rules('date','Date','required');
        $this->form_validation->set_rules('area_id','Area','required');
        $this->form_validation->set_rules('work_desc','Work Description','required');

        if($this->form_validation->run())     
        {   
            $params = $this->input->post();
            $concept_id = $this->Exe_nextday_schedule_model->add_schedule($params);
            redirect('Exe_nextday_schedule/index');
        }
        else
        {
            $this->template->public_render('Exe_nextday_schedule/add', $this->data);      
        }
    }

    function edit($id)
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['schedule'] = $this->Exe_nextday_schedule_model->get_schedule($id);
        $this->data['prj_ids'] = $this->Exe_nextday_schedule_model->get_prj_ids();
        $this->data['trade_ids'] = $this->Exe_nextday_schedule_model->get_trade_ids();
        $this->data['area_ids'] = $this->Exe_nextday_schedule_model->get_area_ids();

        if(isset($this->data['schedule']['id']))
        {
            $this->form_validation->set_rules('prj_id','Project Id','required');
        $this->form_validation->set_rules('trade_id','Trade id','required');
        $this->form_validation->set_rules('date','Date','required');
        $this->form_validation->set_rules('area_id','Area','required');
        $this->form_validation->set_rules('work_desc','Work Description','required');

            if($this->form_validation->run())     
            {   
                $params = $this->input->post();
                $this->Exe_nextday_schedule_model->update_schedule($id,$params);
                redirect('Exe_nextday_schedule/index');
            }
            else
            {
                $this->template->public_render('Exe_nextday_schedule/edit', $this->data); 
            }
        }
        else
        show_error('The bill you are trying to edit does not exist.');
    }

    function remove($id)
    {
        $inv = $this->Exe_nextday_schedule_model->get_schedule($id);
        // check if the stage exists before trying to delete it
        if(isset($inv['id']))
        {
            $this->Exe_nextday_schedule_model->delete_schedule($id);
            redirect('Exe_nextday_schedule/index');
        }
    }

}
?>