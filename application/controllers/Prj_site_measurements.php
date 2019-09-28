<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Prj_site_measurements extends User_Controller
{
    public function __construct() {
        parent :: __construct();
        $this->load->model('Prj_site_measurements_model');
        $this->page_title->push('project measurements');
        $this->data['pagetitle'] = $this->page_title->show();
          /* Breadcrumbs :: Common */
          $this->breadcrumbs->unshift(1, 'site measurements', 'Prj_site_measurements');

    }
    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Prj_site_measurements/index?');
        $config['total_rows'] = $this->Prj_site_measurements_model->get_all_prj_site_measurements_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['site'] = $this->Prj_site_measurements_model->get_all_prj_site_measurements($params);
        $this->data['prj_names'] = $this->Prj_site_measurements_model->get_all_project_list();

        $this->template->public_render('Prj_site_measurement/index', $this->data);
    }
    function image_view($id) {

        $this->breadcrumbs->unshift(2, 'Image View', 'image view');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $site_measurement = $this->Prj_site_measurements_model->get_site_measurement($id);
        $this->data['imagepath'] = "upload/".$site_measurement['attach_name'];
        $this->data['id'] = $id;
        $this->template->public_render('Prj_site_measurement/image_view', $this->data);

    }
    function edit($id)
    {   
        $_SESSION['measurement_filter_id'] = $this->input->post('prj_id');         

        $this->breadcrumbs->unshift(2, 'Edit', 'edit_measurements'); 
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        // check if the site measurement exists before trying to edit it
        $this->data['site_measurement'] = $this->Prj_site_measurements_model->get_site_measurement($id);
        $this->data['proj_list'] = $this->Prj_site_measurements_model->get_all_project_list();
        $config = array(
            'upload_path' => "./upload/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "5000",
            'max_width' => "5000"
        );
        $this->load->library('upload', $config);
        if(isset($this->data['site_measurement']['id']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('project_id','Project','required');
            $this->form_validation->set_rules('name','Name','required');
            // $this->form_validation->set_rules('attach_name','Attachment','required');
            $this->form_validation->set_rules('remarks','Remarks','required');
			
		
			if($this->form_validation->run() && $this->upload->do_upload('attach_name'))     
            {   
                $data = $this->input->post();
                $data['attach_name'] = $this->upload->data()['file_name'];
                $this->Prj_site_measurements_model->update_site_measurement($id,$data);            
                redirect('Prj_site_measurements/index');
            }
            else
            {
                $this->template->public_render('Prj_site_measurement/edit_measurements', $this->data); 
            }
        }
        else
            show_error('The Design layout you are trying to edit does not exist.');
    }
    public function delete($id) 
    {
        $this->Prj_site_measurements_model->delete($id);
        redirect("Prj_site_measurements/");
    }
    function add()
    {   
        $this->data['proj_list'] = $this->Prj_site_measurements_model->get_all_project_list();

        $this->breadcrumbs->unshift(2, 'Add', 'add_measurement');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project_id','Project','required');
        $this->form_validation->set_rules('name','Name','required');
        if (empty($_FILES['attach_name']['name']))
        {
         
            $this->form_validation->set_rules('attach_name', 'Document', 'required');
        }
        $config = array(
            'upload_path' => "./upload/",
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
            $data['attach_name'] = $this->upload->data()['file_name'];
            $site_measurements = $this->Prj_site_measurements_model->add_site_measurements($data);
            
            redirect('Prj_site_measurements/index');

        }
        else
        {   
            $error = array('error' => $this->upload->display_errors()); 
            $this->template->public_render('Prj_site_measurement/add_measurements', $this->data);      
           
        }
    }  
    public function insert() {
        $data = $this->input->post();
        $status = $this->Prj_site_measurements_model->insert($data);
        echo "data inserted";
        if($status) {
            redirect("Prj_site_measurements/");
        } else {
            echo "Error while inserting data";
        }
    }
    function update_remarks($id) {
        $this->Prj_site_measurements_model->update_site_measurement($id,$this->input->post());            
        redirect('Prj_site_measurements/index');

    }
}