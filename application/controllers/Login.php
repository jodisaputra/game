<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		if (isset($this->session->userdata['user_name'])) {
			redirect(base_url('Dashboard'));
		}
		$this->load->view('login');
	}

	public function proses()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		$this->form_validation->set_message('required', '{field} tidak boleh kosong! Mohon Diisi');
		$this->form_validation->set_message('valid_email', 'Mohon isi {field} yang valid');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username      = $this->input->post('username');
		$password   = $this->input->post('password');

		$user = $this->db->get_where('users', ['user_username' => $username])->row_array();

		//Jika user ada
		if ($user) {
			$session = [
				'user_username'              => $user['user_username'],
				'user_name'     			 => $user['user_name']
			];

			$this->session->set_userdata($session);
			redirect(base_url('Dashboard'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            User tidak terdaftar!
                </div>');
			redirect(base_url('Login'));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		//    Anda berhasil logout!
		//         </div>');
		redirect(base_url('Login'));
	}
}
        
    /* End of file  Login.php */
