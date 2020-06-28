<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tournament extends CI_Controller
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
		$judul['judul'] = 'Tournament';
		$data = [
			'list'		=> $this->Tournament_model->list()
		];
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/tournament/index', $data);
		$this->load->view('includes/footer');
	}

	public function insert_form()
	{
		$judul['judul'] = 'Country';

		$data = [
			'game'		=> $this->Game_model->list(),
			'team'		=> $this->Team_model->list()
		];

		$this->load->view('includes/header', $judul);
		$this->load->view('admin/tournament/insert', $data);
		$this->load->view('includes/footer');
	}

	public function insert()
	{
		$this->form_validation->set_rules('tournament_name', 'Tournament Name', 'required|trim');
		$this->form_validation->set_rules('game', 'Game', 'required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('end_date', 'End Date', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required|trim');
		$this->form_validation->set_rules('tour_prize', 'Prizes', 'required|trim');
		$this->form_validation->set_rules('team_1', 'Team 1', 'required');
		$this->form_validation->set_rules('team_2', 'Team 2', 'required');

		$this->form_validation->set_message('required', '{field} required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->insert_form();
		} else {
			$data = [
				'tour_name'				=> $this->input->post('tournament_name'),
				'tour_game'				=> $this->input->post('game'),
				'tour_start_date'		=> $this->input->post('start_date'),
				'tour_end_date'			=> $this->input->post('end_date'),
				'tour_location'			=> $this->input->post('location'),
				'tour_prize'			=> $this->input->post('tour_prize'),
				'tour_team_1'			=> $this->input->post('team_1'),
				'tour_team_2'			=> $this->input->post('team_2'),
				'tour_poin_team_1'		=> $this->input->post('poin_1'),
				'tour_poin_team_2'		=> $this->input->post('poin_2')
			];
			if ($this->Tournament_model->add($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Tournament added successfully
			  </div>');
				redirect('Tournament');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Tournament added Failed
			  </div>');
				redirect('Tournament');
			}
		}
	}

	public function update_form($id)
	{
		$row = $this->Tournament_model->listbyid($id);

		if ($row) {
			$judul['judul'] = 'Tournament';

			$data = [
				'list'	=> $row,
				'game'		=> $this->Game_model->list(),
				'team'		=> $this->Team_model->list()
			];

			$this->load->view('includes/header', $judul);
			$this->load->view('admin/tournament/update', $data);
			$this->load->view('includes/footer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Data not Found!
			  </div>');
			redirect('Tournament');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('tournament_name', 'Tournament Name', 'required|trim');
		$this->form_validation->set_rules('game', 'Game', 'required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('end_date', 'End Date', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required|trim');
		$this->form_validation->set_rules('tour_prize', 'Prizes', 'required|trim');
		$this->form_validation->set_rules('team_1', 'Team 1', 'required');
		$this->form_validation->set_rules('team_2', 'Team 2', 'required');

		$this->form_validation->set_message('required', '{field} required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->update_form($this->input->post('tournament_id'));
		} else {
			$data = [
				'tour_name'				=> $this->input->post('tournament_name'),
				'tour_game'				=> $this->input->post('game'),
				'tour_start_date'		=> $this->input->post('start_date'),
				'tour_end_date'			=> $this->input->post('end_date'),
				'tour_location'			=> $this->input->post('location'),
				'tour_prize'			=> $this->input->post('tour_prize'),
				'tour_team_1'			=> $this->input->post('team_1'),
				'tour_team_2'			=> $this->input->post('team_2'),
				'tour_poin_team_1'		=> $this->input->post('poin_1'),
				'tour_poin_team_2'		=> $this->input->post('poin_2')
			];
			if ($this->Tournament_model->update($this->input->post('tournament_id'), $data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Tournament updated successfully
			  </div>');
				redirect('Tournament');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Tournament updated Failed
			  </div>');
				redirect(site_url('Tournament'));
			}
		}
	}

	public function delete($id)
	{
		if ($this->Tournament_model->delete($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Tournament deleted successfully
			  </div>');
			redirect(site_url('Tournament'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Tournament deleted failed!
			  </div>');
			redirect(site_url('Tournament'));
		}
	}
}
        
    /* End of file  Tournament.php */
