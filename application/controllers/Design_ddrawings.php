<?php

class Design_ddrawings extends Admin_Controller {

     function __construct() {
        parent :: __construct();

        $this->load->model('Design_ddrawings_model');
        /* Title Page :: Common */
        $this->page_title->push('Design Detailed Drawings');
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Design Detailed Drawings', 'Design_ddrawings');        
    }

    public function index() {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Design_ddrawings/index?');
        $config['total_rows'] = $this->Design_ddrawings_model->get_all_design_ddrawings_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['design_ddrawings'] = $this->Design_ddrawings_model->get_all_design_ddrawings($params);
        $this->data['prj_names'] = $this->Design_ddrawings_model->get_all_project_list();
        $this->template->public_render('Design_ddrawings/index', $this->data);

    }

    public function add() {
        $this->data['proj_list'] = $this->Design_ddrawings_model->get_all_project_list();
        $this->data['design_stages'] = $this->Design_ddrawings_model->get_all_design_stage();
        $this->data['review_statuses'] = $this->Design_ddrawings_model->get_all_review_status();
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('prj_id','Project','required');
        // $this->form_validation->set_rules('design_stage_id','Design Stage','required');
        // $this->form_validation->set_rules('attach_name','Attachment','required');
        if (empty($_FILES['attach_name']['name']))
        {
            $this->form_validation->set_rules('attach_name', 'Document', 'required');
        }
        // $this->form_validation->set_rules('review_status','Review Status','required');
        $this->form_validation->set_rules('percentage','Percentage','required');
        // $this->form_validation->set_rules('remarks','Remarks','required');
        // $this->form_validation->set_rules('revisions','Revision','required');
        $prj_name = $this->Design_ddrawings_model->get_proj_name($this->input->post('prj_id'));
        $config = array(
            'upload_path' =>  "./upload/Projects/" . $prj_name . "/Design/Detail Drawings/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "5000",
            'max_width' => "5000"
        );
        $this->load->library('upload', $config);
		if($this->form_validation->run() && $this->upload->do_upload('attach_name'))     
        {   
            $data = $this->input->post();
            $data['revisions'] = "R0";
            $data['review_status'] = 1; 
            $data['attach_name'] = $this->upload->data()['file_name'];
            $design_ddrawings_id = $this->Design_ddrawings_model->add_design_ddrawings($data);
            redirect('Design_ddrawings/index');
        }
        else
        {   
            $this->data['upload_error'] = $this->upload->display_errors();
            $this->template->public_render('Design_ddrawings/add', $this->data);      
           
        }
    }

    function edit($id)
    {   
        $_SESSION['drawing_filter_id'] = $this->input->post('prj_id');         

        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        // check if the Design layout exists before trying to edit it
        $this->data['design_ddrawings'] = $this->Design_ddrawings_model->get_design_ddrawings($id);
        $this->data['proj_list'] = $this->Design_ddrawings_model->get_all_project_list();
        $this->data['design_stages'] = $this->Design_ddrawings_model->get_all_design_stage();
        $this->data['review_statuses'] = $this->Design_ddrawings_model->get_all_review_status();
        $prj_name = $this->Design_ddrawings_model->get_proj_name($this->input->post('prj_id'));
        $config = array(
            'upload_path' =>  "./upload/Projects/" . $prj_name . "/Design/Detail Drawings/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "5000",
            'max_width' => "5000"
        );
        $this->load->library('upload', $config);
        if(isset($this->data['design_ddrawings']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('prj_id','Project','required');
            // $this->form_validation->set_rules('design_stage_id','Design Stage','required');
            // $this->form_validation->set_rules('attach_name','Attachment','required');
            $this->form_validation->set_rules('review_status','Review Status','required');
            $this->form_validation->set_rules('percentage','Percentage','required');
            // $this->form_validation->set_rules('remarks','Remarks','required');
            // $this->form_validation->set_rules('revisions','Revision','required');
			
		
			if($this->form_validation->run() && $this->upload->do_upload('attach_name'))     
            {   
                $data = $this->input->post();
                $data['attach_name'] = $this->upload->data()['file_name'];
                $this->Design_ddrawings_model->update_design_ddrawings($id,$data);            
                redirect('Design_ddrawings/index');
            }
            else
            {
                $this->data['upload_error'] = $this->upload->display_errors();
                $this->template->public_render('Design_ddrawings/edit', $this->data); 
            }
        }
        else
            show_error('The Design layout you are trying to edit does not exist.');
    } 

    function remove($id)
    {
        $_SESSION['drawing_filter_id'] = $this->input->post('prj_id'); 
        $design_ddrawings = $this->Design_ddrawings_model->get_design_ddrawings($id);

        // check if the Design layout exists before trying to delete it
        if(isset($design_ddrawings['id']))
        {
            $this->Design_ddrawings_model->delete_design_ddrawings($id);
            redirect('Design_ddrawings/index');
        }
        else
            show_error('The Design layout you are trying to delete does not exist.');
    }

    function image_view($id) {
        $_SESSION['drawing_filter_id'] = $this->input->post('prj_id'); 
        $this->breadcrumbs->unshift(2, 'Image View', 'image_view');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $design_ddrawing = $this->Design_ddrawings_model->get_design_ddrawings($id);
        $prj_name = $this->Design_ddrawings_model->get_proj_name($design_ddrawing['prj_id']);
        $this->data['imagepath'] = "./upload/Projects/" . $prj_name . "/Design/Detail Drawings/".$design_ddrawing['attach_name'];
        $this->data['id'] = $id;
        $this->template->public_render('Design_ddrawings/image_view', $this->data);

    }

    function update_remarks($id) {
        $data = array("remarks"=>$this->input->post('remarks'));
        if(isset($_POST['check']))
        {
            $this->Design_ddrawings_model->update_design_revision($id,$data);   
            redirect('Design_ddrawings/index');
        }
        else{
            $this->Design_ddrawings_model->update_design_ddrawings($id,$this->input->post());            
            redirect('Design_ddrawings/index');
        }

    }
}

?>