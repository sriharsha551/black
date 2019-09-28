<?php
class Project_List extends User_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Project_List_model');
        $this->page_title->push('Project Summary');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Project List', 'Project List');
        $this->data['types'] = $this->Project_List_model->getTypes();
        $this->data['category'] = $this->Project_List_model->getCategories();
        $this->data['stages'] = $this->Project_List_model->getStages();
    }

    public function index(){
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Proj_List/index?');
        $config['total_rows'] = $this->Project_List_model->getCount();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['projects'] = $this->Project_List_model->getAllProjects();
        $this->data['percentage'] = array();
        foreach($this->data['projects'] as $pro){
            array_push($this->data['percentage'],$this->Project_List_model->getPercentages($pro['id']));
        }
        $this->template->public_render('Proj_List/index', $this->data);
    }

    public function add()
    {   
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('cat_name','Category','required');
        $this->form_validation->set_rules('type','Type','required');
        $this->form_validation->set_rules('pro_name','Project Name','required|max_length[255]');
        $this->form_validation->set_rules('stage','Stage','required');
        
        if($this->form_validation->run())     
        {   
            $projectName = $this->input->post('pro_name');
            $params = array(
                'cat_id'=> $this->input->post('cat_name'),
                'type_id'=> $this->input->post('type'),
                'name' => $this->input->post('pro_name'),
                'stage' => $this->input->post('stage'),
                'remarks' => $this->input->post('remarks'),
                'delete_status'=>'0'
            );
            
            if(is_dir('upload/Projects/'.$projectName)!=1){
                mkdir('./upload/Projects/'.$projectName);
                mkdir('./upload/Projects/'.$projectName.'/Design');
                mkdir('./upload/Projects/'.$projectName.'/Design/Concept');
                mkdir('./upload/Projects/'.$projectName.'/Design/Layout');
                mkdir('./upload/Projects/'.$projectName.'/Design/Render');
                mkdir('./upload/Projects/'.$projectName.'/Design/Detail Drawings');
                mkdir('./upload/Projects/'.$projectName.'/Site');
                mkdir('./upload/Projects/'.$projectName.'/Site/Site Measurements');
                mkdir('./upload/Projects/'.$projectName.'/Site/Site Pics');
                $category_id = $this->Project_List_model->addProject($params);
                redirect('Project_List/index');
            } 
            else
            {   
                $this->data['err'] = 'The '.$projectName.' already in use!!';   
                $this->template->public_render('Proj_List/add', $this->data);
            }
        }
        else
        {      
            $this->template->public_render('Proj_List/add', $this->data);
        }
    }  

/*
 * Editing a category
 */
public function edit($id)
{   
    $this->breadcrumbs->unshift(2, 'Edit', 'edit');
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    // check if the category exists before trying to edit it
    $this->data['project'] = $this->Project_List_model->getProject($id);

    
    if(isset($this->data['project']['id']))
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('cat_name','Category','required');
        $this->form_validation->set_rules('type','Type','required');
        $this->form_validation->set_rules('pro_name','Project Name','required|max_length[255]');
        $this->form_validation->set_rules('stage','Stage','required');
        
        if($this->form_validation->run())     
        {   
            $params = array(
                'cat_id'=> $this->input->post('cat_name'),
                'type_id'=> $this->input->post('type'),
                'name' => $this->input->post('pro_name'),
                'stage' => $this->input->post('stage'),
                'remarks' => $this->input->post('remarks')
            );

            $this->Project_List_model->editProject($id,$params);            
            redirect('Project_List/index');
        }
        else
        {
            $this->template->public_render('Proj_List/edit', $this->data); 
        }
    }
    else
        show_error('The category you are trying to edit does not exist.');
} 

/*
 * Deleting category
 */
public function remove($id)
{
    $pro = $this->Project_List_model->getProject($id);

    // check if the category exists before trying to delete it
    if(isset($pro['id']))
    {
        $this->Project_List_model->deleteProject($id);
        redirect('Project_List/index');
    }
    else
        show_error('The category you are trying to delete does not exist.');
}

}

?>