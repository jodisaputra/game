<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Game_model extends CI_Model
{
	public function list()
	{
		$this->db->join('game_category', 'game_category.gamca_id = game.gm_category');
		$this->db->join('game_developer', 'game_developer.gamde_id = game.gm_developer');
		return $this->db->get('game')->result();
	}

	public function listimage()
	{
		return $this->db->get('game_screenshot')->result();
	}

	public function listbyid($id)
	{
		$this->db->join('game_category', 'game_category.gamca_id = game.gm_category');
		$this->db->join('game_developer', 'game_developer.gamde_id = game.gm_developer');
		$this->db->where('gm_id', $id);
		return $this->db->get('game')->row();
	}

	public function add($data)
	{
		return $this->db->insert('game', $data);
	}

	public function add_image($data)
	{
		return $this->db->insert('game_screenshot', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('gm_id', $id);
		return $this->db->update('game', $data);
	}

	public function delete($id)
	{
		$procedure = "CALL gamedelete(?)";
		return $this->db->query($procedure, $id);
	}

	public function delete_image($id)
	{
		$procedure = "CALL gameimagedelete(?)";
		return $this->db->query($procedure, $id);
	}
}
                        
/* End of file Game_model.php */
