<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends User_Controller {

    public function __construct()
    {
        parent::__construct();
    }


	public function index()
	{
        //$this->load->view('public/home', $this->data);
        /* Load Template */
        $this->template->public_render('test/index', $this->data);
	}
}
