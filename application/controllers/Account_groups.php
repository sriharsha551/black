<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Account_groups extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Account_groups_model');
         /* Title Page :: Common */
         $this->page_title->push('Account Groups');
         $this->data['pagetitle'] = $this->page_title->show();
 
         /* Breadcrumbs :: Common */
         $this->breadcrumbs->unshift(1, 'Account Groups', 'Account_groups');
    } 

    /*
     * Listing of Account_groups
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Account_groups/index?');
        $config['total_rows'] = $this->Account_groups_model->get_all_Account_groups_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['Account_groups'] = $this->Account_groups_model->get_all_Account_groups($params);
        
        $this->template->public_render('Account_groups/index', $this->data);

   
    }

    /*
     * Adding a new Account_groups
     */
    function add()
    {   
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');

		$this->form_validation->set_rules('name','Name','required|max_length[255]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'name' => $this->input->post('name'),
            );
            
            $Account_groups_id = $this->Account_groups_model->add_Account_groups($params);
            redirect('Account_groups/index');
        }
        else
        {      
            $this->template->public_render('Account_groups/add', $this->data);      
           
        }
    }  

    /*
     * Editing a Account_groups
     */
    function edit($id)
    {   
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        // check if the Account_groups exists before trying to edit it
        $this->data['Account_groups'] = $this->Account_groups_model->get_Account_groups($id);
        
        if(isset($this->data['Account_groups']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('name','Name','required|max_length[255]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
                    'name' => $this->input->post('name'),
                    'enabled' => $this->input->post('enabled'),
                    'updated_at' => date("Y-m-d H:i:s"),
                );
                $this->Account_groups_model->update_Account_groups($id,$params);            
                redirect('Account_groups/index');
            }
            else
            {
                $this->template->public_render('Account_groups/edit', $this->data); 
            }
        }
        else
            show_error('The Account_groups you are trying to edit does not exist.');
    } 

    /*
     * Deleting Account_groups
     */
    function remove($id)
    {
        $Account_groups = $this->Account_groups_model->get_Account_groups($id);
        $safe_delete = $this->Account_groups_model->get_safe_delete($id);
        // check if the Account_groups exists before trying to delete it
        if(isset($Account_groups['id']))
        {
            if($safe_delete)
            {
                $this->Account_groups_model->delete_Account_groups($id);
                redirect('Account_groups/index');
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Cant delete item!");';
                echo '</script>';
                redirect('Account_groups/index','refresh');
            }
           
        }
        else
            show_error('The Account_groups you are trying to delete does not exist.');
    }
    
}
