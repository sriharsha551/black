<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Employee extends User_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Employees_model');
        $this->load->model('Department_model');
        $this->load->model('Designation_model');

         /* Title Page :: Common */
         $this->page_title->push('Employee');
         $this->data['pagetitle'] = $this->page_title->show();
 
         /* Breadcrumbs :: Common */
         $this->breadcrumbs->unshift(1, 'Employee', 'employee');

         $this->load->library('Pdf');
    } 

    /*
     * Listing of Employee
     */
    function index()
    {
        //$params['limit'] = RECORDS_PER_PAGE; 
        //$params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        /* $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Employee/index?');
        $config['total_rows'] = $this->Employees_model->get_all_employee_count();
        $this->pagination->initialize($config); */

        /* Breadcrumbs */
    $this->breadcrumbs->unshift(2, 'Listing', 'employee');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['employee'] = $this->Employees_model->get_all_employee();

        /* Load Template */
        $this->template->public_render('Employee/index', $this->data);
    }

    function Joining()
    {
        $this->breadcrumbs->unshift(2, 'Joining', 'Employee/Joining');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');

        $this->data['department'] = $this->Department_model->get_all_department();
        $this->data['designation'] = $this->Designation_model->get_all_designation();
        $this->data["empId"]=$this->Employees_model->get_empid();
        
		$this->form_validation->set_rules('empName','Employee Name','required');
        $this->form_validation->set_rules('Designation','Designation','required');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
                'empId' => $this->input->post('empId'),
                'empName' => $this->input->post('empName'),
				'Designation' => $this->input->post('Designation'),
				'Department' => $this->input->post('Department'),
				'presentAddress' => $this->input->post('presentAddress'),
				'permanentAddress' => $this->input->post('permanentAddress'),
				'phone' => $this->input->post('emp_phone'),
                'email' => $this->input->post('email'),
                'DOJ' => $this->input->post('DOJ'),	
                'PON' => $this->input->post('PON'),
                'POD' => $this->input->post('POD'),	
                'gender' => $this->input->post('gender'),
                'original_certificate' => $this->input->post('original_certificate'),
				'experience_certificate' => $this->input->post('experience_certificate'),
				'id_proof' => $this->input->post('id_proof'),
                'education_certificate' => $this->input->post('education_certificate'),
                'photos' => $this->input->post('photos'),				
            ); 
            $employee_id = $this->Employees_model->add_employee($params);
            //family details
            foreach($this->input->post('fullName') as $key=>$fname) 
            {
                
                if($this->input->post('fullName')[$key]!="")
                {
                    $family[] = array(
                        'fullName' =>$this->input->post('fullName')[$key],
                        'relation' => $this->input->post('relation')[$key],
                        'occupation' => $this->input->post('occupation')[$key],
                        'phone' => $this->input->post('phone')[$key],
                        'empId' => $employee_id
                        );
                }                
            }
            if(isset($family))
            {
                $this->Employees_model->add_employee_family($family);
            }
            
            //Qualification details
            foreach($this->input->post('qualification') as $key=>$fname) 
            {
                if($this->input->post('qualification')[$key]!="")
                {
                    $qualification[] = array(
                        'qualification' =>$this->input->post('qualification')[$key],
                        'institute' => $this->input->post('institute')[$key],
                        'yearOfPassing' => $this->input->post('yearOfPassing')[$key],
                        'marks' => $this->input->post('marks')[$key],
                        'empId' => $employee_id
                        );
                }                
            }
            if(isset($qualification))
            {
                $this->Employees_model->add_employee_education($qualification);
            }  

            //create credentials

            $username = strtolower($this->input->post('empName'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->password_generate(7);

			$additional_data = array(
                'phone'      => $this->input->post('emp_phone'),
                'employee_id'=> $employee_id,
            );
            $this->ion_auth->register($username, $password, $email, $additional_data);
            echo $password; exit;
            $this->send_password_tomail($username, $password, $email, $additional_data);
            redirect('Employee');          
        }
        else
        {  
            //echo "r"; exit;   
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));       
            $this->template->public_render('Employee/joining_form', $this->data);            
        }
    }

    function password_generate($chars) 
    {
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($data), 0, $chars);
    }

    
    /*
     * Editing a employee
     */
    function edit($id)
    {   
        // check if the employee exists before trying to edit it
        $this->breadcrumbs->unshift(2, lang('menu_groups_create'), 'Employee/Joining');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['employee'] = $this->Employees_model->get_employee($id);
        $this->data['families'] = $this->Employees_model->get_employee_family($id);
        $this->data['education']= $this->Employees_model->get_employee_education($id);

        $this->data['department'] = $this->Department_model->get_all_department();
        $this->data['designation'] = $this->Designation_model->get_all_designation();
        $this->data["empId"]=$this->Employees_model->get_empid();
        
        
        if(isset($this->data['employee']['id']))
        {
            
            $this->load->library('form_validation');

			$this->form_validation->set_rules('empName','Employee Name','required');
            $this->form_validation->set_rules('Designation','Designation','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'empId' => $this->input->post('empId'),
                    'empName' => $this->input->post('empName'),
                    'Designation' => $this->input->post('Designation'),
                    'Department' => $this->input->post('Department'),
                    'presentAddress' => $this->input->post('presentAddress'),
                    'permanentAddress' => $this->input->post('permanentAddress'),
                    'phone' => $this->input->post('emp_phone'),
                    'email' => $this->input->post('email'),
                    'DOJ' => date("Y-m-d",strtotime($this->input->post('DOJ'))),	
                    'PON' => $this->input->post('PON'),
                    'POD' => date("Y-m-d",strtotime($this->input->post('POD'))),	
                    'gender' => $this->input->post('gender'),
                    'original_certificate' => $this->input->post('original_certificate'),
                    'experience_certificate' => $this->input->post('experience_certificate'),
                    'id_proof' => $this->input->post('id_proof'),
                    'education_certificate' => $this->input->post('education_certificate'),
                    'photos' => $this->input->post('photos'),		
                );

                $this->Employees_model->update_employee($id,$params);  
                
               $this->Employees_model->delete_employee_family_empid($id);
               $this->Employees_model->delete_employee_education($id);
                //family details
                foreach($this->input->post('fullName') as $key=>$fname) 
                {
                    
                    if($this->input->post('fullName')[$key]!="")
                    {
                        $family[] = array(
                            'fullName' =>$this->input->post('fullName')[$key],
                            'relation' => $this->input->post('relation')[$key],
                            'occupation' => $this->input->post('occupation')[$key],
                            'phone' => $this->input->post('phone')[$key],
                            'empId' => $id
                            );
                    }                
                }
                if(isset($family))
                {
                    $this->Employees_model->add_employee_family($family);
                }
                
                //Qualification details
                foreach($this->input->post('qualification') as $key=>$fname) 
                {
                    if($this->input->post('qualification')[$key]!="")
                    {
                        $qualification[] = array(
                            'qualification' =>$this->input->post('qualification')[$key],
                            'institute' => $this->input->post('institute')[$key],
                            'yearOfPassing' => $this->input->post('yearOfPassing')[$key],
                            'marks' => $this->input->post('marks')[$key],
                            'empId' => $id
                            );
                    }                
                }
                if(isset($qualification))
                {
                    $this->Employees_model->add_employee_education($qualification);
                }           
                redirect('Employee/index');
            }
            else
            {
                $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));       
                $this->template->public_render('Employee/edit', $this->data);   
            }
        }
        else
            show_error('The employee you are trying to edit does not exist.');
    } 

    function view($id)
    {   
        // check if the employee exists before trying to edit it
        $this->breadcrumbs->unshift(2, 'Details', 'Employee/view');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['employee'] = $this->Employees_model->get_employee($id);
        $this->data['families'] = $this->Employees_model->get_employee_family($id);
        $this->data['education']= $this->Employees_model->get_employee_education($id);

        $this->data['department'] = $this->Department_model->get_all_department();
        $this->data['designation'] = $this->Designation_model->get_all_designation();
        $this->data["empId"]=$this->Employees_model->get_empid();
        
        
        if(isset($this->data['employee']['id']))
        {            
            $this->template->public_render('Employee/view', $this->data);   
        }
        else
            show_error('The employee you are trying to edit does not exist.');
    } 

    function Increment_Letter()
    {
        $this->data['employee'] = $this->Employees_model->get_all_employee();
        $this->breadcrumbs->unshift(2, 'Increament Letter', 'Employee/Increment_Letter');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->form_validation->set_rules('prefix','Employee Prefix','required');
        $this->form_validation->set_rules('empName','Exployee Name','required');
        $this->form_validation->set_rules('amount','Revised Amount','required');
        $this->form_validation->set_rules('in_words','Amount In Words','required');
        $this->form_validation->set_rules('revised_from','Effected Date','required');
        if($this->form_validation->run())     
        {   
            $params = array(
                'prefix' => $this->input->post('prefix'),
                //'empId' => $this->input->post('empName'),
				'empName' => $this->input->post('empName'),
				'amount' => $this->input->post('amount'),
				'in_words' => $this->input->post('in_words'),
				'revised_from' => $this->input->post('revised_from')			
            ); 
            
            require_once(APPPATH.'controllers/Createpdf.php');
            $Createpdf = new Createpdf();
            $Createpdf->generateIncrementPDF($params);
            //redirect('Createpdf/generateIncrementPDF');
        }
        else
        {     
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));       
            
            $this->template->public_render('Employee/increment', $this->data);
            
        }
    }
    
    function Increments_list()
    {
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, 'Increament Letter', 'Employee/Increment_Letter');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['increaments'] = $this->Employees_model->get_all_increament();
        $this->template->public_render('Employee/increment_list', $this->data);
    }

    function increment_delete($id)
    {
        $this->Employees_model->delete_increment($id);
        redirect('Employee/Increments_list');
    }


    function Appraisal_Letter()
    {
        $this->data['employee'] = $this->Employees_model->get_all_employee();
        $this->breadcrumbs->unshift(2, 'Appraisal Letter', 'Employee/Appraisal_list');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
       // $this->form_validation->set_rules('prefix','Employee Prefix','required');
        $this->form_validation->set_rules('empName','Exployee Name','required');
        $this->form_validation->set_rules('amount','Revised Amount','required');
        $this->form_validation->set_rules('in_words','Amount In Words','required');
        $this->form_validation->set_rules('revised_from','Effected Date','required');
        if($this->form_validation->run())     
        {   
           
            //redirect('Createpdf/generateIncrementPDF');
        }
        else
        {     
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));       
            
            $this->template->public_render('Appraisal/add', $this->data);
            
        }
    }
    
    function Appraisal_list()
    {
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, 'Appraisal Letter', 'Employee/Appraisal_Letter');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['apppraisals'] = $this->Employees_model->get_all_appraisal();
        $this->template->public_render('Appraisal/index', $this->data);
    }

    function Appraisal_delete($id)
    {
        $this->Employees_model->delete_appraisal($id);
        redirect('Employee/Appraisal_list');
    }

    function Certificate()
    {
        $this->page_title->push('Certificates recieved');
        $this->data['pagetitle'] = $this->page_title->show();
       
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('employee/index?');
        $config['total_rows'] = $this->Employees_model->get_all_employee_count();
        $this->pagination->initialize($config);

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, 'Listing', 'employee');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['employee'] = $this->Employees_model->get_all_employee();

        /* Load Template */
        $this->template->public_render('Employee/certificate', $this->data);
    }

    function Certificate_Update($id)
    {
        $this->breadcrumbs->unshift(2, 'Certificates', 'Employee/Certificate');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['employee'] = $this->Employees_model->get_employee($id);
        $this->data["empId"]=$this->Employees_model->get_empid();
        if(isset($this->data['employee']['id']))
        { 
            if($this->input->post('original_certificate'))     
            {
               
                $params = array(
					
                    'original_certificate' => $this->input->post('original_certificate'),
                    'experience_certificate' => $this->input->post('experience_certificate'),
                    'id_proof' => $this->input->post('id_proof'),
                    'education_certificate' => $this->input->post('education_certificate'),
                    'photos' => $this->input->post('photos'),		
                );

                $this->Employees_model->update_employee($id,$params);  
                redirect('Employee/Certificate');
            }
            else
            {
                $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));       
                $this->template->public_render('Employee/certificate_edit', $this->data);   
            }
        }
        else
            show_error('The employee you are trying to edit does not exist.');
    }

    function Generate_certificate()
    {
        
    }

    function Offer_Letter()
    {
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, 'Offer Letter', 'employee');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['employee'] = $this->Employees_model->get_all_employee();

        /* Load Template */
        $this->template->public_render('Employee/offer_letter', $this->data);
    }

    function Experience_Letter()
    {
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, 'Offer Letter', 'employee');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['employee'] = $this->Employees_model->get_all_employee();

        /* Load Template */
        $this->template->public_render('Employee/experience_Letter', $this->data);
    }

    /*
     * Deleting employee
     */
    function remove($id)
    {
        $employee = $this->Employees_model->get_employee($id);

        // check if the employee exists before trying to delete it
        if(isset($employee['id']))
        {
            $this->Employees_model->delete_employee($id);
            redirect('Employee/index');
        }
        else
            show_error('The employee you are trying to delete does not exist.');
    }


    function reset($id)
    {
        $password = $this->password_generate(7);
        echo $password; exit;
        $this->send_password_tomail($username, $password, $email, $additional_data);
        redirect('Employee');          
    }
    
}
