<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{

	public function list()
	{
		return $this->db->get('news')->result();
	}

	public function listbyid($id)
	{
		$this->db->where('news_id', $id);
		return $this->db->get('news')->row();
	}

	public function add($data)
	{
		return $this->db->insert('news', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('news_id', $id);
		return $this->db->update('news', $data);
	}

	public function delete($id)
	{
		$procedure = "CALL newsdelete(?)";
		return $this->db->query($procedure, $id);
	}
}
                        
/* End of file News_model.php */
