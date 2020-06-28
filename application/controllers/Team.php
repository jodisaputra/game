<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Team extends CI_Controller
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
		$judul['judul'] = 'Team';
		$data = [
			'list'		=> $this->Team_model->list(),
		];
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/team/index', $data);
		$this->load->view('includes/footer');
	}

	public function insert_form()
	{
		$judul['judul'] = 'Team';
		$data = [
			'country'	=> $this->Country_model->list(),
		];
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/team/insert', $data);
		$this->load->view('includes/footer');
	}

	public function uploadImage()
	{
		$config['upload_path']          = './assets/team/';
		$config['allowed_types'] 		= 'gif|jpg|png|jpeg';
		$config['file_name']            = $this->input->post('team_name');
		$config['overwrite']			= true;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('gambar')) {
			return $this->upload->data('file_name');
		}
	}

	public function insert()
	{
		$this->form_validation->set_rules('team_name', 'Team Name', 'required|trim');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$this->form_validation->set_message('required', '{field} required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->insert_form();
		} else {
			$data = [
				'team_name'		=> $this->input->post('team_name'),
				'team_country'	=> $this->input->post('country'),
				'team_description'	=> $this->input->post('description'),
				'team_logo' => $this->uploadImage()
			];
			if ($this->Team_model->add($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Team added successfully
			  </div>');
				redirect('Team');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Team added Failed
			  </div>');
				redirect('Team');
			}
		}
	}

	public function update_form($id)
	{
		$row = $this->Team_model->listbyid($id);

		if ($row) {
			$judul['judul'] = 'Team';

			$data = [
				'list'	=> $row,
				'country'	=> $this->Country_model->list(),
			];

			$this->load->view('includes/header', $judul);
			$this->load->view('admin/team/update', $data);
			$this->load->view('includes/footer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Data not Found!
			  </div>');
			redirect('Team');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('team_name', 'Team Name', 'required|trim');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$this->form_validation->set_message('required', '{field} required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->update_form($this->input->post('team_id'));
		} else {
			if (!empty($_FILES['gambar']['name'])) {
				$gambar = $this->uploadImage();
			} else {
				$gambar = $this->input->post('gambar_old');
			}

			$data = [
				'team_name'		=> $this->input->post('team_name'),
				'team_country'	=> $this->input->post('country'),
				'team_description'	=> $this->input->post('description'),
				'team_logo' => $gambar
			];
			if ($this->Team_model->update($this->input->post('team_id'), $data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Team update successfully
			  </div>');
				redirect('Team');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Team update Failed
			  </div>');
				redirect('Team');
			}
		}
	}

	public function delete($id)
	{
		if ($this->Team_model->delete($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Team deleted successfully
			  </div>');
			redirect(site_url('Team'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Team deleted failed!
			  </div>');
			redirect(site_url('Team'));
		}
	}
}
        
    /* End of file  Team.php */
