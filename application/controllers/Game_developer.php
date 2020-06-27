<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Game_developer extends CI_Controller
{

	public function index()
	{
		$judul['judul'] = 'Game Developer';
		$data = [
			'list'		=> $this->Gamedeveloper_model->list(),
		];
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/game_developer/index', $data);
		$this->load->view('includes/footer');
	}

	public function insert_form()
	{
		$judul['judul'] = 'Game Developer';

		$this->load->view('includes/header', $judul);
		$this->load->view('admin/game_developer/insert');
		$this->load->view('includes/footer');
	}

	public function insert()
	{
		$this->form_validation->set_rules('developer_name', 'Developer Name', 'required|trim');

		$this->form_validation->set_message('required', 'Game Developer required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->insert_form();
		} else {
			$data = [
				'gamde_developer_name'		=> $this->input->post('developer_name')
			];
			if ($this->Gamedeveloper_model->add($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Game developer added successfully
			  </div>');
				redirect('Game_developer');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Game developer added Failed
			  </div>');
				redirect('Game_developer');
			}
		}
	}

	public function update_form($id)
	{
		$row = $this->Gamedeveloper_model->listbyid($id);

		if ($row) {
			$judul['judul'] = 'Game Developer';

			$data = [
				'list'	=> $row
			];

			$this->load->view('includes/header', $judul);
			$this->load->view('admin/game_developer/update', $data);
			$this->load->view('includes/footer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Data not Found!
			  </div>');
			redirect('Game_developer');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('developer_name', 'Developer Name', 'required|trim');

		$this->form_validation->set_message('required', 'Game Developer required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->update_form($this->input->post('developer_id'));
		} else {
			$data = [
				'gamde_developer_name'		=> $this->input->post('developer_name')
			];
			if ($this->Gamedeveloper_model->update($this->input->post('developer_id'), $data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Game Developer updated successfully
			  </div>');
				redirect('Game_developer');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Game Developer updated Failed
			  </div>');
				redirect(site_url('Game_developer'));
			}
		}
	}

	public function delete($id)
	{
		if ($this->Gamedeveloper_model->delete($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Game Developer deleted successfully
			  </div>');
			redirect(site_url('Game_developer'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Game Developer deleted failed!
			  </div>');
			redirect(site_url('Game_developer'));
		}
	}
}
        
    /* End of file  Game_developer.php */
