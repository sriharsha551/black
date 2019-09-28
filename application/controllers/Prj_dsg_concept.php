<?php 

class Prj_dsg_concept extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Prj_dsg_concept_model');
        
        $this->page_title->push('Concept');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Concept', 'Prj_dsg_concept');
    }

    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Prj_dsg_concept/index?');
        $config['total_rows'] = $this->Prj_dsg_concept_model->get_all_concepts_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['concepts'] = $this->Prj_dsg_concept_model->get_all_concepts($params);
        $this->data['prj_names'] = $this->Prj_dsg_concept_model->get_prj_names();
        $this->template->public_render('Prj_dsg_concept/index',$this->data);
    }

    function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('prj_id','Project_id','required');
        // $this->form_validation->set_rules('design_stage_id','Design stage id','required');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('attach_link','Attach link','required');
        $this->form_validation->set_rules('percentage','Percentage','required');
        // $this->form_validation->set_rules('review_status','Review status','required');
        // $this->form_validation->set_rules('remarks','Remarks','required');
        // $this->form_validation->set_rules('revisions','Revisions','required');

        if($this->form_validation->run())     
        {   
            $params = array(
                'prj_id' => $this->input->post('prj_id'),
                // 'design_stage_id'=>$this->input->post('design_stage_id'),
                'name'=> $this->input->post('name'),
                'attach_link'=>$this->input->post('attach_link'),
                'percentage'=>$this->input->post('percentage'),
                'review_status'=>1,
                // 'remarks'=>$this->input->post('remarks'),
                'revisions'=>"R0"
            );
            $concept_id = $this->Prj_dsg_concept_model->add_concept($params);
            redirect('Prj_dsg_concept/index');
        }
        else
        {
            $this->data['prj_names'] = $this->Prj_dsg_concept_model->get_prj_names();
            $this->data['dsg_names'] = $this->Prj_dsg_concept_model->get_dsg_names();
            $this->template->public_render('Prj_dsg_concept/add', $this->data);      
        }
    }

    function edit($id)
    {

        $_SESSION['concept_filter_id'] = $this->input->post('prj_id');         

        $this->data['prj_names'] = $this->Prj_dsg_concept_model->get_prj_names();
        $this->data['dsg_names'] = $this->Prj_dsg_concept_model->get_dsg_names();
        $this->data['spl'] = array_values($this->data['dsg_names']);
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['review_statuses'] = $this->Prj_dsg_concept_model->get_all_review_status();

        $this->data['concept'] = $this->Prj_dsg_concept_model->get_concept($id);

        if(isset($this->data['concept']['id']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('prj_id','Project_id','required');
            // $this->form_validation->set_rules('design_stage_id','Design stage id','required');
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('attach_link','Attach link','required');
            $this->form_validation->set_rules('percentage','Percentage','required');
            $this->form_validation->set_rules('review_status','Review status','required');
            // $this->form_validation->set_rules('remarks','Remarks','required');
            // $this->form_validation->set_rules('revisions','Revisions','required');
            if($this->form_validation->run())     
            {   
                $params = array(
                    'prj_id' => $this->input->post('prj_id'),
                    'design_stage_id' => $this->input->post('design_stage_id'),
                    'name' => $this->input->post('name'),
                    'attach_link' => $this->input->post('attach_link'),
                    'percentage' => $this->input->post('percentage'),
                    'review_status' => $this->input->post('review_status'),
                    'remarks' => $this->input->post('remarks'),
                    // 'revisions' => $this->input->post('revisions'),
                );
                if(isset($_POST['check']))
                {
                    $this->Prj_dsg_concept_model->update_concept_revision($id,$params);
                    redirect('Prj_dsg_concept/index');
                }
                else{
                    
                $this->Prj_dsg_concept_model->update_concept($id,$params);   
                redirect('Prj_dsg_concept/index');
                }
            }
            else
            {
                $this->template->public_render('Prj_dsg_concept/edit', $this->data); 
            }
        }
        else
        show_error('The concept you are trying to edit does not exist.');
    }

    function remove($id)
    {
        $_SESSION['concept_filter_id'] = $this->input->post('prj_id'); 
        $concept = $this->Prj_dsg_concept_model->get_concept($id);
        // check if the stage exists before trying to delete it
        if(isset($concept['id']))
        {
            $this->Prj_dsg_concept_model->delete_concept($id);
            redirect('Prj_dsg_concept/index');
        }
    }

}
?>