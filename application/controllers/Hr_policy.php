<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Hr_policy extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
       // $this->load->model('Memo_model');
         /* Title Page :: Common */
         $this->page_title->push('Hr Policy');
         $this->data['pagetitle'] = $this->page_title->show();
 
         /* Breadcrumbs :: Common */
         $this->breadcrumbs->unshift(1, 'Hr Policy', 'Hr_policy');
    } 

    /*
     * Listing of memo
     */
    function index()
    {
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
       
        $this->template->public_render('Content/hr_policy', $this->data);
  
    }
}