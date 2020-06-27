<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('admin/dash/dashboard');
		$this->load->view('includes/footer');
	}
}
        
    /* End of file  Dashboard.php */
