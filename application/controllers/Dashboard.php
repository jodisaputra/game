<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (isset($this->session->userdata['user_name'])) {
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda Belum Login!
            </div>');
			redirect(base_url('Login'));
		}
	}

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('admin/dash/dashboard');
		$this->load->view('includes/footer');
	}
}
        
    /* End of file  Dashboard.php */
