<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Country extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (isset($this->session->userdata['nama'])) {
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda Belum Login!
            </div>');
			redirect(base_url('Login'));
		}
	}

	public function index()
	{
		$judul['judul'] = 'Country';
		$data = [
			'list'		=> $this->Country_model->list(),
		];
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/country/index', $data);
		$this->load->view('includes/footer');
	}

	public function insert_form()
	{
		$judul['judul'] = 'Country';

		$this->load->view('includes/header', $judul);
		$this->load->view('admin/country/insert');
		$this->load->view('includes/footer');
	}

	public function insert()
	{
		// $this->form_validation->set_rules('country_id', 'Country Id', 'required|trim');
		$this->form_validation->set_rules('country_name', 'Country Name', 'required|trim');

		$this->form_validation->set_message('required', 'Country required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->insert_form();
		} else {
			$data = [
				// 'coun_id'				=> $this->input->post('country_id'),
				'coun_country_name'		=> $this->input->post('country_name')
			];
			if ($this->Country_model->add($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Country added successfully
			  </div>');
				redirect('Country');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Country added Failed
			  </div>');
				redirect('Country');
			}
		}
	}

	public function update_form($id)
	{
		$row = $this->Country_model->listbyid($id);

		if ($row) {
			$judul['judul'] = 'Country';

			$data = [
				'list'	=> $row
			];

			$this->load->view('includes/header', $judul);
			$this->load->view('admin/country/update', $data);
			$this->load->view('includes/footer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Data not Found!
			  </div>');
			redirect('Country');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('country_name', 'Country Name', 'required|trim');

		$this->form_validation->set_message('required', 'Country required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->update_form($this->input->post('country_id'));
		} else {
			$data = [
				'coun_country_name'		=> $this->input->post('country_name')
			];
			if ($this->Country_model->update($this->input->post('country_id'), $data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Country updated successfully
			  </div>');
				redirect('Country');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Country updated Failed
			  </div>');
				redirect(site_url('Country'));
			}
		}
	}

	public function delete($id)
	{
		if ($this->Country_model->delete($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Country deleted successfully
			  </div>');
			redirect(site_url('Country'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Country deleted failed!
			  </div>');
			redirect(site_url('Country'));
		}
	}
}
        
    /* End of file  Country.php */
