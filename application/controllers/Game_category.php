<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Game_category extends CI_Controller
{

	public function index()
	{
		$judul['judul'] = 'Game Category';
		$data = [
			'list'		=> $this->Gamecategory_model->list(),
		];
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/game_category/index', $data);
		$this->load->view('includes/footer');
	}

	public function insert_form()
	{
		$judul['judul'] = 'Game Category';

		$this->load->view('includes/header', $judul);
		$this->load->view('admin/game_category/insert');
		$this->load->view('includes/footer');
	}

	public function insert()
	{
		$this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');

		$this->form_validation->set_message('required', 'Game Category required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->insert_form();
		} else {
			$data = [
				'gamca_category_name'		=> $this->input->post('category_name')
			];
			if ($this->Gamecategory_model->add($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Game category added successfully
			  </div>');
				redirect('Game_category');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Game category added Failed
			  </div>');
				redirect('Game_category');
			}
		}
	}

	public function update_form($id)
	{
		$row = $this->Gamecategory_model->listbyid($id);

		if ($row) {
			$judul['judul'] = 'Game Category';

			$data = [
				'list'	=> $row
			];

			$this->load->view('includes/header', $judul);
			$this->load->view('admin/game_category/update', $data);
			$this->load->view('includes/footer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Data not Found!
			  </div>');
			redirect('Game_category');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');

		$this->form_validation->set_message('required', 'Category required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->update_form($this->input->post('category_id'));
		} else {
			$data = [
				'gamca_category_name'		=> $this->input->post('category_name')
			];
			if ($this->Gamecategory_model->update($this->input->post('category_id'), $data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Game Category updated successfully
			  </div>');
				redirect('Game_category');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Game Category updated Failed
			  </div>');
				redirect(site_url('Game_category'));
			}
		}
	}

	public function delete($id)
	{
		if ($this->Gamecategory_model->delete($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Game Category deleted successfully
			  </div>');
			redirect(site_url('Game_category'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Game Category deleted failed!
			  </div>');
			redirect(site_url('Game_category'));
		}
	}
}
        
    /* End of file  Game_category.php */
