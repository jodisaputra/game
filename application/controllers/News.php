<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{

	public function index()
	{
		$judul['judul'] = 'News';
		$data = [
			'list'		=> $this->News_model->list(),
		];
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/news/index', $data);
		$this->load->view('includes/footer');
	}

	public function insert_form()
	{
		$judul['judul'] = 'News';
		$this->load->view('includes/header', $judul);
		$this->load->view('admin/news/insert');
		$this->load->view('includes/footer');
	}

	public function uploadImage()
	{
		$config['upload_path']          = './assets/news/';
		$config['allowed_types'] 		= 'gif|jpg|png|jpeg';
		$config['file_name']            = $this->input->post('news_title');
		$config['overwrite']			= true;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('gambar')) {
			return $this->upload->data('file_name');
		}
	}

	public function insert()
	{
		$this->form_validation->set_rules('news_title', 'News Title', 'required|trim');
		$this->form_validation->set_rules('news_description', 'News Description', 'required|trim');

		$this->form_validation->set_message('required', '{field} required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->insert_form();
		} else {
			$data = [
				'news_title'		=> $this->input->post('news_title'),
				'news_description'	=> $this->input->post('news_description'),
				'news_release_date'	=> date('Y-m-d H:i:s'),
				'news_image' 		=> $this->uploadImage()
			];
			if ($this->News_model->add($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				News added successfully
			  </div>');
				redirect('News');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				News added Failed
			  </div>');
				redirect('News');
			}
		}
	}

	public function update_form($id)
	{
		$row = $this->News_model->listbyid($id);

		if ($row) {
			$judul['judul'] = 'News';

			$data = [
				'list'	=> $row,
				'country'	=> $this->News_model->list(),
			];

			$this->load->view('includes/header', $judul);
			$this->load->view('admin/news/update', $data);
			$this->load->view('includes/footer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Data not Found!
			  </div>');
			redirect('News');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('news_title', 'News Title', 'required|trim');
		$this->form_validation->set_rules('news_description', 'News Description', 'required|trim');

		$this->form_validation->set_message('required', '{field} required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->update_form($this->input->post('news_id'));
		} else {
			if (!empty($_FILES['gambar']['name'])) {
				$gambar = $this->uploadImage();
			} else {
				$gambar = $this->input->post('gambar_old');
			}

			$data = [
				'news_title'		=> $this->input->post('news_title'),
				'news_description'	=> $this->input->post('news_description'),
				'news_release_date'	=> date('Y-m-d H:i:s'),
				'news_image' 		=> $gambar
			];
			if ($this->News_model->update($this->input->post('news_id'), $data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				News update successfully
			  </div>');
				redirect('News');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				News update Failed
			  </div>');
				redirect('News');
			}
		}
	}

	public function delete($id)
	{
		if ($this->News_model->delete($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				News deleted successfully
			  </div>');
			redirect(site_url('News'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				News deleted failed!
			  </div>');
			redirect(site_url('News'));
		}
	}
}
        
    /* End of file  News.php */
