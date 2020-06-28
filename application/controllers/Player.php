<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Player extends CI_Controller
{

	public function index()
	{
		$judul['judul'] = 'Player';
		$data = [
			'list'		=> $this->Player_model->list(),
		];
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/player/index', $data);
		$this->load->view('includes/footer');
	}

	public function insert_form()
	{
		$judul['judul'] = 'Player';
		$data = [
			'country'		=> $this->Country_model->list(),
			'team'			=> $this->Team_model->list(),
		];
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/player/insert', $data);
		$this->load->view('includes/footer');
	}

	public function insert()
	{
		$this->form_validation->set_rules('country', 'Country Name', 'required');
		$this->form_validation->set_rules('team', 'Team Name', 'required');
		$this->form_validation->set_rules('player_name', 'Player Name', 'required|trim');
		$this->form_validation->set_rules('player_nickname', 'Player Nickname', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'required|trim');

		$this->form_validation->set_message('required', '{field} required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->insert_form();
		} else {
			$data = [
				'play_team'			=> $this->input->post('team'),
				'play_country'		=> $this->input->post('country'),
				'play_player_name'		=> $this->input->post('player_name'),
				'play_player_nickname'	=> $this->input->post('player_nickname'),
				'play_player_description' => $this->input->post('description')
			];
			if ($this->Player_model->add($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Player added successfully
			  </div>');
				redirect('Player');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Player added Failed
			  </div>');
				redirect('Player');
			}
		}
	}

	public function update_form($id)
	{
		$row = $this->Player_model->listbyid($id);

		if ($row) {
			$judul['judul'] = 'Player';

			$data = [
				'list'	=> $row,
				'country'		=> $this->Country_model->list(),
				'team'			=> $this->Team_model->list(),
			];

			$this->load->view('includes/header', $judul);
			$this->load->view('admin/player/update', $data);
			$this->load->view('includes/footer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Data not Found!
			  </div>');
			redirect('Player');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('country', 'Country Name', 'required');
		$this->form_validation->set_rules('team', 'Team Name', 'required');
		$this->form_validation->set_rules('player_name', 'Player Name', 'required|trim');
		$this->form_validation->set_rules('player_nickname', 'Player Nickname', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'required|trim');

		$this->form_validation->set_message('required', '{field} required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->update_form($this->input->post('player_id'));
		} else {
			$data = [
				'play_team'			=> $this->input->post('team'),
				'play_country'		=> $this->input->post('country'),
				'play_player_name'		=> $this->input->post('player_name'),
				'play_player_nickname'	=> $this->input->post('player_nickname'),
				'play_player_description' => $this->input->post('description')
			];
			if ($this->Player_model->update($this->input->post('player_id'), $data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Player updated successfully
			  </div>');
				redirect('Player');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Player updated Failed
			  </div>');
				redirect(site_url('Player'));
			}
		}
	}

	public function delete($id)
	{
		if ($this->Player_model->delete($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Player deleted successfully
			  </div>');
			redirect(site_url('Player'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Player deleted failed!
			  </div>');
			redirect(site_url('Player'));
		}
	}
}
        
    /* End of file  Player.php */
