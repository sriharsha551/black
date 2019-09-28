<?php 

class Prj_Review extends Admin_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Prj_Review_model');
        $this->page_title->push('Review');
        $this->data['pagetitle'] = $this->page_title->show();
        $this->breadcrumbs->unshift(1, 'Review', 'Review');
    }

    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Proj_Review/index?');
        $config['total_rows'] = $this->Prj_Review_model->getCount();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['reviews'] = $this->Prj_Review_model->getAllReviews();
        $this->template->public_render('Proj_Review/index', $this->data);   
    }

    function add()
    {   
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');

		$this->form_validation->set_rules('name','Name','required|max_length[255]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'review_status_name' => $this->input->post('name'),
            );
            
            $status_id = $this->Prj_Review_model->addReview($params);
            redirect('Prj_Review/index');
        }
        else
        {      
            $this->template->public_render('Proj_Review/add', $this->data);      
           
        }
    }

    function remove($id)
    {
        $status = $this->Prj_Review_model->getReview($id);

        // check if the status exists before trying to delete it
        if(isset($status['id']))
        {
            $this->Prj_Review_model->deleteReview($id);
            redirect('Prj_Review/index');
        }
        else
            show_error('The status you are trying to delete does not exist.');
    }

}

?>