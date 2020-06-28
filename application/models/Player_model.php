<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Player_model extends CI_Model
{

	function list()
	{
		$this->db->join('team', 'team.team_id = player.play_team');
		$this->db->join('country', 'country.coun_id = player.play_country');
		return $this->db->get('player')->result();
	}

	function listbyid($id)
	{
		$this->db->join('team', 'team.team_id = player.play_team');
		$this->db->join('country', 'country.coun_id = player.play_country');
		$this->db->where('play_id', $id);
		return $this->db->get('player')->row();
	}

	function add($data)
	{
		return $this->db->insert('player', $data);
	}

	function update($id, $data)
	{
		$this->db->where('play_id', $id);
		return $this->db->update('player', $data);
	}

	public function delete($id)
	{
		$procedure = "CALL playerdelete(?)";
		return $this->db->query($procedure, $id);
	}
}
                        
/* End of file Player_model.php */
