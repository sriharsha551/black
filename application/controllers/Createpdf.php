<?php
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * @package Createpdf :  CodeIgniter Create PDF
     *
     * @author TechArise Team
     *
     * @email  info@techarise.com
     *   
     * Description of Createpdf Controller
     */
    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Createpdf extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Employees_model');
            $this->load->model('Employee_resign_model');
            $this->load->model('Memo_model');
           // $this->load->model('Createpdf_model', 'createpdf');
        }
        public function index() {       
            $data['title'] = 'Create PDF | Krisp';
            //$data['getInfo'] = $this->createpdf->getContent();  
            $this->load->view('pdf/index', $data);
        }    
        // generate PDF File
         public function generatePDFFile() {
            $data = array();            
            $htmlContent='';
            $data['getInfo'] = '';
            $htmlContent = $this->load->view('pdf/file', $data, TRUE);       
            $createPDFFile = time().'.pdf';
            $this->createPDF(FCPATH.$createPDFFile, $htmlContent);
            redirect(base_url().$createPDFFile);
         }

         //releaving pdf generator
         public function generateReleavingPDF($id) {
            $data['employee'] = $this->Employees_model->get_employee($id);
            if($data['employee']['empName']=="Male") {$prefix = "Mr."; $relation = "S/o"; } 
            else  { $prefix = "Ms."; $relation = "D/o"; }

            $data['employee']['prefix']=$prefix;
            $data['employee']['relation']=$relation;
            $data['employee']['father']=$this->Employees_model->get_father($id);
            $data['employee']['department'] = $this->Employees_model->get_employee_department($id);
            $data['employee']['designation'] = $this->Employees_model->get_employee_designation($id);
            $resignation = $this->Employee_resign_model->get_employee_resign($id);
            $data['employee']['resignation_data'] = $resignation['resign_date'];
            //update generation time
            $params = array(
                'certificate_receipt_generated_on' =>   date("Y-m-d"),
            );
            $this->Employees_model->update_employee($id,$params);
            $htmlContent='';
            $htmlContent = $this->load->view('pdf/releaving', $data, TRUE);       
            $createPDFFile = 'releaving_'.$id.'.pdf';
            $this->createPDF(FCPATH.'/pdf/releaving/'.$createPDFFile, $htmlContent);
            redirect(base_url().'pdf/releaving/'.$createPDFFile);
         }

         //increament letter
         public function generateIncrementPDF() {
           
            $params1 = array(
                'employee_id' => $this->input->post('empName'),
                'amount' => $this->input->post('amount'),
                'in_words' => $this->input->post('in_words'),
				'revised_from' => date("Y-m-d",strtotime($this->input->post('revised_from'))),		
            ); 

            $inc_id=$this->Employees_model->add_increament($params1); 
            
            $data['employee'] = $this->Employees_model->get_employee($this->input->post('empName'));
            if($data['employee']['empName']=="Male") $prefix = "Mr.";
            else $prefix = "Ms.";
            $params2 = array(
                'employee_name' => $data['employee']['empName'],
                'empId' => $data['employee']['empId'],
                'prefix' => $prefix,
            );

            $params = array_merge($params1 , $params2 );
            $htmlContent='';
            $htmlContent = $this->load->view('pdf/increment_letter', $params, TRUE);       
            $createPDFFile = 'increment_'.$inc_id.'.pdf';
           // C:\xampp\htdocs\purple\/pdf/offerLetter/offerLetter_16.pdf
            $this->createPDF(FCPATH.'/pdf/increments/'.$createPDFFile, $htmlContent);
            redirect(base_url().'pdf/increments/'.$createPDFFile);
         }

         public function generateCertificatePDF($id){
            $data['employee'] = $this->Employees_model->get_employee($id);
            if($data['employee']['empName']=="Male") {$prefix = "Mr."; $relation = "S/o"; } 
            else  { $prefix = "Ms."; $relation = "D/o"; }

            $data['employee']['prefix']=$prefix;
            $data['employee']['relation']=$relation;
            $data['employee']['father']=$this->Employees_model->get_father($id);
            //update generation time
            $params = array(
                'certificate_receipt_generated_on' =>   date("Y-m-d"),
            );
            $this->Employees_model->update_employee($id,$params);
            $htmlContent='';
            $htmlContent = $this->load->view('pdf/certificate_reciept_letter', $data, TRUE);       
            $createPDFFile = 'certificate_'.$id.'.pdf';
            $this->createPDF(FCPATH.'/pdf/certificates/'.$createPDFFile, $htmlContent);
            redirect(base_url().'pdf/certificates/'.$createPDFFile);
         }

         public function generateOfferLetterPDF($id){
            $data['employee'] = $this->Employees_model->get_employee($id);
            if($data['employee']['empName']=="Male") {$prefix = "Mr."; $relation = "S/o"; } 
            else  { $prefix = "Ms."; $relation = "D/o"; }

            $data['employee']['prefix']=$prefix;
            $data['employee']['relation']=$relation;
            $data['employee']['father']=$this->Employees_model->get_father($id);
            //update generation time only for the 1st time
        
            if($data['employee']['offer_letter_generated_on']=="")
            {
                $params = array(
                    'offer_letter_generated_on' =>   date("Y-m-d"),
                );
                $this->Employees_model->update_employee($id,$params);
            }
            
            $htmlContent='';
            $htmlContent = $this->load->view('pdf/offer_letter', $data, TRUE);       
            $createPDFFile = 'offerLetter_'.$id.'.pdf';
            $this->createPDF(FCPATH.'/pdf/offerLetter/'.$createPDFFile, $htmlContent);
            redirect(base_url().'pdf/offerLetter/'.$createPDFFile);
         }

         public function generateAppraisalPDF()
         {
            
            $params1 = array(
                'employee_id' => $this->input->post('empName'),
                'project_name' => $this->input->post('project_name'),
                'amount' => $this->input->post('amount'),
                'in_words' => $this->input->post('in_words'),
				'letter_date' => date("Y-m-d",strtotime($this->input->post('revised_from'))),		
            ); 

            $inc_id=$this->Employees_model->add_appraisal($params1); 
            $data['employee'] = $this->Employees_model->get_employee($this->input->post('empName'));
            if($data['employee']['empName']=="Male") $prefix = "Mr.";
            else $prefix = "Ms.";
            $params2 = array(
                'employee_name' => $data['employee']['empName'],
                'empId' => $data['employee']['empId'],
                'prefix' => $prefix,
            );

            $params = array_merge($params1 , $params2 );
           // print_r($params); exit;
            $htmlContent='';
            $htmlContent = $this->load->view('pdf/appraisal', $params, TRUE);       
            $createPDFFile = 'appraisal_'.$inc_id.'.pdf';
            $this->createPDF(FCPATH.'/pdf/appraisal/'.$createPDFFile, $htmlContent);
            redirect(base_url().'pdf/appraisal/'.$createPDFFile);
         }

         public function generateExperiencePDF($id)
         {
            $data['employee'] = $this->Employees_model->get_employee($id);
            if($data['employee']['empName']=="Male") {$prefix = "Mr."; $relation = "S/o"; } 
            else  { $prefix = "Ms."; $relation = "D/o"; }

            $data['employee']['prefix']=$prefix;
            $data['employee']['relation']=$relation;
            $data['employee']['father']=$this->Employees_model->get_father($id);
            $data['employee']['department'] = $this->Employees_model->get_employee_department($id);
            $data['employee']['designation'] = $this->Employees_model->get_employee_designation($id);
            //update generation time
            $params = array(
                'experience_letter_generated_on' =>   date("Y-m-d"),
            );
            $this->Employees_model->update_employee($id,$params);
            $htmlContent='';
            $htmlContent = $this->load->view('pdf/experience_letter', $data, TRUE);       
            $createPDFFile = 'experience_'.$id.'.pdf';
            $this->createPDF(FCPATH.'pdf/experience/'.$createPDFFile, $htmlContent);
            redirect(base_url().'pdf/experience/'.$createPDFFile);
         }

         public function generateMEMOPDF($id)
         {
            $data["memo"] = $this->Memo_model->get_memo($id);
            $htmlContent='';
            $htmlContent = $this->load->view('pdf/memo', $data, TRUE);       
            $createPDFFile = 'memo_'.$id.'.pdf';
            $this->createPDF(FCPATH.'pdf/memo/'.$createPDFFile, $htmlContent);
            redirect(base_url().'pdf/memo/'.$createPDFFile);
         }

        // create pdf file 
        public function createPDF($fileName,$html) {
            ob_start(); 
            // Include the main TCPDF library (search for installation path).
            $this->load->library('Pdf');
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Purple');
            $pdf->SetTitle('Purple');
            $pdf->SetSubject('Purple');
            $pdf->SetKeywords('Purple');

            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '', '');

            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            
            //$pdf->SetPrintHeader(false);
            //$pdf->SetPrintFooter(false);

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(10);
            $pdf->SetFooterMargin(25);

            // set auto page breaks
             $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }       

            // set font
            $pdf->SetFont('dejavusans', '', 10);

            // add a page
            $pdf->AddPage();

            // output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');

            // reset pointer to the last page
            $pdf->lastPage();       
            ob_end_clean();
            //Close and output PDF document
            $pdf->Output($fileName, 'F');        
        }
    }
?>