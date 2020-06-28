<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gamepatch_model extends CI_Model
{

	function list()
	{
		$this->db->join('game', 'game.gm_id = game_patch.gampa_game');
		return $this->db->get('game_patch')->result();
	}

	function listbyid($id)
	{
		$this->db->join('game', 'game.gm_id = game_patch.gampa_game');
		$this->db->where('gampa_id', $id);
		return $this->db->get('game_patch')->row();
	}

	function add($data)
	{
		return $this->db->insert('game_patch', $data);
	}

	function update($id, $data)
	{
		$this->db->where('gampa_id', $id);
		return $this->db->update('game_patch', $data);
	}

	public function delete($id)
	{
		$procedure = "CALL gamepatchdelete(?)";
		return $this->db->query($procedure, $id);
	}
}
                        
/* End of file Gamepatch_model.php */
