<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
	public function index()
	{
		$data = [
			'berita'		=> $this->News_model->list(),
		];
		$this->load->view('includes/head');
		$this->load->view('index', $data);
		$this->load->view('includes/foot');
	}

	public function news($id)
	{
		$data = [
			'berita'		=> $this->News_model->listbyid($id),
		];

		$this->load->view('includes/head');
		$this->load->view('news', $data);
		$this->load->view('includes/foot');
	}

	public function games()
	{
		$data = [
			'tournament'		=> $this->Tournament_model->list(),
			'team'				=> $this->Team_model->list()
		];

		$this->load->view('includes/head');
		$this->load->view('games', $data);
		$this->load->view('includes/foot');
	}
}
