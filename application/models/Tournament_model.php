<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tournament_model extends CI_Model
{

	function list()
	{
		$this->db->join('game', 'game.gm_id = tournament.tour_game');
		$this->db->join('team', 'team.team_id = tournament.tour_team_1');
		return $this->db->get('tournament')->result();
	}

	function listbyid($id)
	{
		$this->db->join('game', 'game.gm_id = tournament.tour_game');
		$this->db->join('team', 'team.team_id = tournament.tour_team_1');
		$this->db->where('tour_id', $id);
		return $this->db->get('tournament')->row();
	}

	function add($data)
	{
		return $this->db->insert('tournament', $data);
	}

	function update($id, $data)
	{
		$this->db->where('tour_id', $id);
		return $this->db->update('tournament', $data);
	}

	public function delete($id)
	{
		$procedure = "CALL tournamentdelete(?)";
		return $this->db->query($procedure, $id);
	}
}
                        
/* End of file Tournament_model.php */
