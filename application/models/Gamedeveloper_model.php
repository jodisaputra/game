<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gamedeveloper_model extends CI_Model
{

	public function list()
	{
		return $this->db->get('game_developer')->result();
	}

	public function listbyid($id)
	{
		$this->db->where('gamde_id', $id);
		return $this->db->get('game_developer')->row();
	}

	public function add($data)
	{
		return $this->db->insert('game_developer', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('gamde_id', $id);
		return $this->db->update('game_developer', $data);
	}

	public function delete($id)
	{
		$procedure = "CALL gamedeveloperdelete(?)";
		return $this->db->query($procedure, $id);
	}
}
                        
/* End of file Gamedeveloper_model.php */
