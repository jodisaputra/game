<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Game_patch extends CI_Controller
{

	public function index()
	{
		$judul['judul'] = 'Game Patch';
		$data = [
			'list'		=> $this->Gamepatch_model->list(),
		];
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/game_patch/index', $data);
		$this->load->view('includes/footer');
	}

	public function insert_form()
	{
		$judul['judul'] = 'Game Patch';

		$data = [
			'game'		=> $this->Game_model->list(),
		];

		$this->load->view('includes/header', $judul);
		$this->load->view('admin/game_patch/insert', $data);
		$this->load->view('includes/footer');
	}

	public function insert()
	{
		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'required|trim');
		$this->form_validation->set_rules('version', 'Version', 'required|trim');
		$this->form_validation->set_rules('game', 'Game', 'required');

		$this->form_validation->set_message('required', '{field} required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->insert_form();
		} else {
			$data = [
				'gampa_title'			=> $this->input->post('title'),
				'gampa_description'		=> $this->input->post('description'),
				'gampa_version_update'	=> $this->input->post('version'),
				'gampa_game'			=> $this->input->post('game'),
				'gampa_release_update'	=> date('Y-m-d H:i:s')
			];
			if ($this->Gamepatch_model->add($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Game Patch added successfully
			  </div>');
				redirect('Game_patch');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Game Patch added Failed
			  </div>');
				redirect('Game_patch');
			}
		}
	}

	public function update_form($id)
	{
		$row = $this->Gamepatch_model->listbyid($id);

		if ($row) {
			$judul['judul'] = 'Game Patch';

			$data = [
				'list'	=> $row,
				'game'		=> $this->Game_model->list(),
			];

			$this->load->view('includes/header', $judul);
			$this->load->view('admin/game_patch/update', $data);
			$this->load->view('includes/footer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Data not Found!
			  </div>');
			redirect('Game_patch');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'required|trim');
		$this->form_validation->set_rules('version', 'Version', 'required|trim');
		$this->form_validation->set_rules('game', 'Game', 'required');

		$this->form_validation->set_message('required', '{field} required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->update_form($this->input->post('gamepatch_id'));
		} else {
			$data = [
				'gampa_title'			=> $this->input->post('title'),
				'gampa_description'		=> $this->input->post('description'),
				'gampa_version_update'	=> $this->input->post('version'),
				'gampa_game'			=> $this->input->post('game'),
				'gampa_release_update'	=> date('Y-m-d H:i:s')
			];
			if ($this->Gamepatch_model->update($this->input->post('gamepatch_id'), $data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Game Patch updated successfully
			  </div>');
				redirect('Game_patch');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Game Patch updated Failed
			  </div>');
				redirect(site_url('Game_patch'));
			}
		}
	}

	public function delete($id)
	{
		if ($this->Gamepatch_model->delete($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Game Patch deleted successfully
			  </div>');
			redirect(site_url('Game_patch'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Game Patch deleted failed!
			  </div>');
			redirect(site_url('Game_patch'));
		}
	}
}
        
    /* End of file  Game_patch.php */
