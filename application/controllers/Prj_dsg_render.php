<?php

class Prj_dsg_render extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Prj_dsg_render_model');

        $this->page_title->push('Render');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Render', 'Prj_dsg_render');
    }

    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Prj_dsg_render/index?');
        $config['total_rows'] = $this->Prj_dsg_render_model->get_all_renders_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['renders'] = $this->Prj_dsg_render_model->get_all_renders($params);
        $this->data['prj_names'] = $this->Prj_dsg_render_model->get_prj_names();

        $this->template->public_render('Prj_dsg_render/index', $this->data);
    }

    public function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $prj_name = $this->Prj_dsg_render_model->get_proj_name($this->input->post('prj_id'));
        $config = array(
            'upload_path' => "./upload/Projects/" . $prj_name . "/Design/Render/",
            'allowed_types' => "jpg|png|jpeg",
            'overwrite' => true,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "2000",
            'max_width' => "2000",
        );
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('attach_name')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $image_info = $this->upload->data();
        }

        $this->form_validation->set_rules('prj_id', 'Project_id', 'required');
        // $this->form_validation->set_rules('design_stage_id','Design stage id','required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        if (empty($_FILES['attach_name'])) {
            $this->form_validation->set_rules('attach_name', 'Attach name', 'required');
        }
        $this->form_validation->set_rules('percentage', 'Percentage', 'required');
        // $this->form_validation->set_rules('review_status','Review status','required');
        // $this->form_validation->set_rules('revisions','Revisions','required');

        if ($this->form_validation->run()) {
            $params = array(
                'prj_id' => $this->input->post('prj_id'),
                // 'design_stage_id'=>$this->input->post('design_stage_id'),
                'name' => $this->input->post('name'),
                'attach_name' => $this->upload->data()['file_name'],
                'percentage' => $this->input->post('percentage'),
                'review_status' => 1,
                'remarks' => $this->input->post('remarks'),
                'revisions' => "R0",
            );
            $render_id = $this->Prj_dsg_render_model->add_render($params);
            redirect('Prj_dsg_render/index');
        } else {
            $this->data['prj_names'] = $this->Prj_dsg_render_model->get_prj_names();
            // $this->data['dsg_names'] = $this->Prj_dsg_render_model->get_dsg_names();
            $this->template->public_render('Prj_dsg_render/add', $this->data);
        }
    }

    public function edit($id)
    {
        $_SESSION['render_filter_id'] = $this->input->post('prj_id');

        $this->data['prj_names'] = $this->Prj_dsg_render_model->get_prj_names();
        $this->data['dsg_names'] = $this->Prj_dsg_render_model->get_dsg_names();
        $this->data['spl'] = array_values($this->data['dsg_names']);
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['review_statuses'] = $this->Prj_dsg_render_model->get_all_review_status();
        $this->data['render'] = $this->Prj_dsg_render_model->get_render($id);
        $prj_name = $this->Prj_dsg_render_model->get_proj_name($id);
        $config = array(
            'upload_path' => "./upload/Projects/" . $prj_name . "/Design/Render/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => true,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "5000",
            'max_width' => "5000",
        );

        $this->load->library('upload', $config);
        if (isset($this->data['render']['id'])) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('prj_id', 'Project_id', 'required');
            // $this->form_validation->set_rules('design_stage_id','Design stage id','required');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('percentage', 'Percentage', 'required');
            // $this->form_validation->set_rules('attach_name', 'Attach name', 'required');
            $this->form_validation->set_rules('review_status', 'Review status', 'required');
            // $this->form_validation->set_rules('remarks','Remarks','required');
            // $this->form_validation->set_rules('revisions','Revisions','required');
            if ($this->form_validation->run() && $this->upload->do_upload('attach_name')) 
            {
                $params = array(
                    'prj_id' => $this->input->post('prj_id'),
                    // 'design_stage_id' => $this->input->post('design_stage_id'),
                    'name' => $this->input->post('name'),
                    'attach_name' => $this->upload->data()['file_name'],
                    'percentage' => $this->input->post('percentage'),
                    'review_status' => $this->input->post('review_status'),
                    // 'remarks' => $this->input->post('remarks'),
                    // 'revisions' => $this->input->post('revisions'),
                );
                $this->Prj_dsg_render_model->update_render($id, $params);
                redirect('Prj_dsg_render/index');
            } else {
                $this->data['upload_error'] = $this->upload->display_errors();
                $this->template->public_render('Prj_dsg_render/edit', $this->data);
            }
        } else {
            show_error('The render you are trying to edit does not exist.');
        }

    }

    public function remove($id)
    {
        $_SESSION['render_filter_id'] = $this->input->post('prj_id');
        $prj_name = $this->Prj_dsg_render_model->get_proj_name($this->input->post('prj_id'));
        $render = $this->Prj_dsg_render_model->get_render($id);
        // check if the stage exists before trying to delete it
        if (isset($render['id'])) {
            $this->Prj_dsg_render_model->delete_render($id);
            redirect('Prj_dsg_render/index');
        }
    }

    public function image_display($img, $id)
    {
        $this->breadcrumbs->unshift(2, 'Image View', 'image_display');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('remarks', 'Remarks', 'required');
        if ($this->form_validation->run()) {
            $data = array("remarks" => $this->input->post('remarks'));
            if (isset($_POST['check'])) {
                $this->Prj_dsg_render_model->update_render_revision($id, $data);
                redirect('Prj_dsg_render/index');
            } else {
                $this->Prj_dsg_render_model->update_render($id, $data);
                redirect('Prj_dsg_render/index');
            }
        } else {
            $this->data['img'] = $img;
            $this->data['id'] = $id;
            $render = $this->Prj_dsg_render_model->get_render($id);
            $this->data['prj_name'] = $this->Prj_dsg_render_model->get_proj_name($render['prj_id']);
            $this->template->public_render('Prj_dsg_render/image_display', $this->data);
        }
    }
}
