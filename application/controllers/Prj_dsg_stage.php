<?php 

class Prj_dsg_stage extends User_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Prj_dsg_stage_model');
        /* Title Page :: Common */
        $this->page_title->push('Design Stages');
        $this->data['pagetitle'] = $this->page_title->show();
         /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Design Stages', 'Prj_dsg_stage');
    }

    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Prj_dsg_stage/index?');
        $config['total_rows'] = $this->Prj_dsg_stage_model->get_all_stages_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['stages'] = $this->Prj_dsg_stage_model->get_all_stages($params);

        $this->template->public_render('Prj_dsg_stage/index',$this->data);
    }

    function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('stage','Stage','required|max_length[255]');
        if($this->form_validation->run())     
        {   
            $params = array(
				'design_stage' => $this->input->post('stage'),
            );
            
            $stage_id = $this->Prj_dsg_stage_model->add_stage($params);
            redirect('Prj_dsg_stage/index');
        }
        else
        {      
            $this->template->public_render('Prj_dsg_stage/add', $this->data);      
           
        }
    }
    
    function edit($id)
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        // check if the stage exists before trying to edit it
        $this->data['stage'] = $this->Prj_dsg_stage_model->get_stage($id);

        if(isset($this->data['stage']['id']))
        {
            $this->load->library('form_validation');
			$this->form_validation->set_rules('stage','Stage','required|max_length[255]');
            if($this->form_validation->run())     
            {   
                $params = array(
					'design_stage' => $this->input->post('stage'),
                );

                $this->Prj_dsg_stage_model->update_stage($id,$params);            
                redirect('Prj_dsg_stage/index');
            }
            else
            {
                $this->template->public_render('Prj_dsg_stage/edit', $this->data); 
            }
        }
        else
        show_error('The stage you are trying to edit does not exist.');
        
    }

    function remove($id)
    {
        $stage = $this->Prj_dsg_stage_model->get_stage($id);
        // check if the stage exists before trying to delete it
        if(isset($stage['id']))
        {
            $this->Prj_dsg_stage_model->delete_stage($id);
            redirect('Prj_dsg_stage/index');
        }
    }
}

?>