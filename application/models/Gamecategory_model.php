<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gamecategory_model extends CI_Model
{

	public function list()
	{
		return $this->db->get('game_category')->result();
	}

	public function listbyid($id)
	{
		$this->db->where('gamca_id', $id);
		return $this->db->get('game_category')->row();
	}

	public function add($data)
	{
		return $this->db->insert('game_category', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('gamca_id', $id);
		return $this->db->update('game_category', $data);
	}

	public function delete($id)
	{
		$procedure = "CALL gamecategorydelete(?)";
		return $this->db->query($procedure, $id);
	}
}
                        
/* End of file Country_model.php */
