<?php
class Category extends User_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Category_model');
        $this->page_title->push('Project Category');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Category', 'Category');
        $this->data['types'] = $this->Category_model->getTypes();
    }

    public function index(){
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Proj_Category/index?');
        $config['total_rows'] = $this->Category_model->getCount();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['category'] = $this->Category_model->getAllCategories();
        $this->template->public_render('Proj_Category/index', $this->data);
    }

public function add()
{   
    $this->breadcrumbs->unshift(2, 'Add', 'add');
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->load->library('form_validation');

    $this->form_validation->set_rules('name','Name','required|max_length[255]');
    $this->form_validation->set_rules('type','Type','required');
    
    if($this->form_validation->run())     
    {   
        $params = array(
            'category' => $this->input->post('name'),
            'type_id'=>$this->input->post('type'),
            'delete_status'=>'0'
        );
        
        $category_id = $this->Category_model->addCategory($params);
        redirect('Category/index');
    }
    else
    {      
        $this->template->public_render('Proj_Category/add', $this->data);      
       
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
    $this->data['category'] = $this->Category_model->getCategory($id);

    
    if(isset($this->data['category']['id']))
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name','Name','required|max_length[255]');
        $this->form_validation->set_rules('type','Type','required');
    
        if($this->form_validation->run())     
        {   
            $params = array(
                'category' => $this->input->post('name'),
                'type_id'=>$this->input->post('type')
            );

            $this->Category_model->editCategory($id,$params);            
            redirect('Category/index');
        }
        else
        {
            $this->template->public_render('Proj_Category/edit', $this->data); 
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
    $category = $this->Category_model->getCategory($id);

    // check if the category exists before trying to delete it
    if(isset($category['id']))
    {
        $this->Category_model->deleteCategory($id);
        redirect('Category/index');
    }
    else
        show_error('The category you are trying to delete does not exist.');
}

}

?>