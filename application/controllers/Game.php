<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Game extends CI_Controller
{

	public function index()
	{
		$judul['judul'] = 'Game';
		$data = [
			'list'		=> $this->Game_model->list(),
		];
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/game/index', $data);
		$this->load->view('includes/footer');
	}

	public function insert_form()
	{
		$judul['judul'] = 'Game';
		$data = [
			'category'	=> $this->Gamecategory_model->list(),
			'developer'	=> $this->Gamedeveloper_model->list(),
		];
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/game/insert', $data);
		$this->load->view('includes/footer');
	}

	public function uploadImage()
	{
		$config['upload_path']          = './assets/game/';
		$config['allowed_types'] 		= 'gif|jpg|png|jpeg';
		$config['file_name']            = $this->input->post('game_name');
		$config['overwrite']			= true;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('gambar')) {
			return $this->upload->data('file_name');
		}
	}

	public function insert()
	{
		$this->form_validation->set_rules('game_name', 'Game Name', 'required|trim');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('developer', 'Developer', 'required');
		$this->form_validation->set_rules('detail', 'Detail', 'required|trim');
		$this->form_validation->set_rules('release_date', 'Game Name', 'required');


		$this->form_validation->set_message('required', '{field} required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->insert_form();
		} else {
			$data = [
				'gm_name'		=> $this->input->post('game_name'),
				'gm_category'	=> $this->input->post('category'),
				'gm_developer'	=> $this->input->post('developer'),
				'gm_detail'		=> $this->input->post('detail'),
				'gm_release_date' => $this->input->post('release_date'),
				'gm_image_screenshot' => $this->uploadImage()
			];
			if ($this->Game_model->add($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Game added successfully
			  </div>');
				redirect('Game');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Game added Failed
			  </div>');
				redirect('Game');
			}
		}
	}

	public function update_form($id)
	{
		$row = $this->Game_model->listbyid($id);

		if ($row) {
			$judul['judul'] = 'Game';

			$data = [
				'list'	=> $row,
				'category'	=> $this->Gamecategory_model->list(),
				'developer'	=> $this->Gamedeveloper_model->list(),
			];

			$this->load->view('includes/header', $judul);
			$this->load->view('admin/game/update', $data);
			$this->load->view('includes/footer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Data not Found!
			  </div>');
			redirect('Game');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('game_name', 'Game Name', 'required|trim');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('developer', 'Developer', 'required');
		$this->form_validation->set_rules('detail', 'Detail', 'required|trim');
		$this->form_validation->set_rules('release_date', 'Game Name', 'required');


		$this->form_validation->set_message('required', '{field} required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->update_form($this->input->post('game_id'));
		} else {
			if (!empty($_FILES['gambar']['name'])) {
				$gambar = $this->uploadImage();
			} else {
				$gambar = $this->input->post('gambar_old');
			}
			$data = [
				'gm_name'		=> $this->input->post('game_name'),
				'gm_category'	=> $this->input->post('category'),
				'gm_developer'	=> $this->input->post('developer'),
				'gm_detail'		=> $this->input->post('detail'),
				'gm_release_date' => $this->input->post('release_date'),
				'gm_image_screenshot' => $gambar
			];
			if ($this->Game_model->update($this->input->post('game_id'), $data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Game added successfully
			  </div>');
				redirect('Game');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Game added Failed
			  </div>');
				redirect('Game');
			}
		}
	}

	public function delete($id)
	{
		if ($this->Game_model->delete($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Game deleted successfully
			  </div>');
			redirect(site_url('Game'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Game deleted failed!
			  </div>');
			redirect(site_url('Game'));
		}
	}

	public function image()
	{
		$judul['judul'] = 'Game Screenshot';
		$data = [
			'game'		=> $this->Game_model->list(),
			'list'		=> $this->Game_model->listimage(),
		];
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/game/image', $data);
		$this->load->view('includes/footer');
	}

	public function image_insert()
	{
		$judul['judul'] = 'Game Screenshot';
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/game/add_image');
		$this->load->view('includes/footer');
	}

	public function insert_image_action()
	{
		$data = [
			'gamsc_game'		=> $this->uri->segment(3),
			'gamsc_screenshot' => $this->uploadImage()
		];
		if ($this->Game_model->add_image($data)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Game added successfully
		  </div>');
			redirect('Game/image/' . $this->uri->segment(3));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			Game added Failed
		  </div>');
			redirect('Game/image/' . $this->uri->segment(3));
		}
	}

	public function delete_image($id)
	{
		if ($this->Game_model->delete_image($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Game deleted successfully
			  </div>');
			redirect('Game/image/' . $this->uri->segment(3));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Game deleted failed!
			  </div>');
			redirect('Game/image/' . $this->uri->segment(3));
		}
	}
}
        
    /* End of file  Game.php */
