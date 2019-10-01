<?php 

class Exe_tools_rent extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Exe_tools_rent_model');
        
        $this->page_title->push('Execution Tools Rent');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Execution Tools Rent', 'Exe_tools_rent');
    }

    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Exe_tools_rent/index?');
        $config['total_rows'] = $this->Exe_tools_rent_model->get_all_tools_rent_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['tools_rents'] = $this->Exe_tools_rent_model->get_all_tools_rent($params);
        for($i=0;$i<count($this->data['tools_rents']);$i++)
        {
            if($this->data['tools_rents'][$i]['hire_end']==NULL)
            {
                $date1 = date_create(date('Y-m-d'));
                $date2 = date_create($this->data['tools_rents'][$i]['hire_start']);
                $diff =date_diff($date2,$date1);
                $this->data['tools_rents'][$i]['no_of_days']=($diff->format("%R%a"));
            }
            else
            {
                $date1 = date_create($this->data['tools_rents'][$i]['hire_end']);
                $date2 = date_create($this->data['tools_rents'][$i]['hire_start']);
                $diff =date_diff($date2,$date1);
                $this->data['tools_rents'][$i]['no_of_days']=($diff->format("%R%a"));
            }
            
        }
        $this->template->public_render('Exe_tools_rent/index',$this->data);
    }

    function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->data['prj_ids'] = $this->Exe_tools_rent_model->get_prj_ids();
        $this->data['tool_ids'] = $this->Exe_tools_rent_model->get_tool_ids();
        $this->form_validation->set_rules('prj_id','Project Id','required');
        $this->form_validation->set_rules('tool_id','Tool id','required');
        $this->form_validation->set_rules('hire_start','Start Date','required');
        $this->form_validation->set_rules('no_of_hours','No Of Hours','less_than[24]|required|greater_than[0]');
        $this->form_validation->set_rules('remarks','Remarks','required');

        if($this->form_validation->run())     
        {   
            $params = $this->input->post();
            $rent_id = $this->Exe_tools_rent_model->add_tools_rent($params);
            redirect('Exe_tools_rent/index');
        }
        else
        {
            $this->template->public_render('Exe_tools_rent/add', $this->data);      
        }
    }

    function edit($id)
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['tools_rent'] = $this->Exe_tools_rent_model->get_tools_rent($id);
        $this->data['prj_ids'] = $this->Exe_tools_rent_model->get_prj_ids();
        $this->data['tool_ids'] = $this->Exe_tools_rent_model->get_tool_ids();
        if(isset($this->data['tools_rent']['id']))
        {
            $this->form_validation->set_rules('prj_id','Project Id','required');
        $this->form_validation->set_rules('tool_id','Tool id','required');
        $this->form_validation->set_rules('hire_start','Start Date','required');
        // $this->form_validation->set_rules('hire_end','End Date','greater_than[hire_start]');
        $this->form_validation->set_rules('no_of_hours','No Of Hours','less_than[24]|required|greater_than[0]');
        $this->form_validation->set_rules('remarks','Remarks','required');


            if($this->form_validation->run())     
            {   
                $params = $this->input->post();
                if($params['hire_end']=='')
                {
                    $params['hire_end']=null;
                }
                $this->Exe_tools_rent_model->update_tools_rent($id,$params);
                redirect('Exe_tools_rent/index');
            }
            else
            {
                $this->template->public_render('Exe_tools_rent/edit', $this->data); 
            }
        }
        else
        show_error('The rent you are trying to edit does not exist.');
    }

    function remove($id)
    {
        $inv = $this->Exe_tools_rent_model->get_tools_rent($id);
        // check if the stage exists before trying to delete it
        if(isset($inv['id']))
        {
            $this->Exe_tools_rent_model->delete_tools_rent($id);
            redirect('Exe_tools_rent/index');
        }
    }

}
?>