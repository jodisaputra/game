<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Team_model extends CI_Model
{
	function list()
	{
		$this->db->join('country', 'country.coun_id = team.team_country');
		return $this->db->get('team')->result();
	}

	function listbyid($id)
	{
		$this->db->join('country', 'country.coun_id = team.team_country');
		$this->db->where('team_id', $id);
		return $this->db->get('team')->row();
	}

	function add($data)
	{
		return $this->db->insert('team', $data);
	}

	function update($id, $data)
	{
		$this->db->where('team_id', $id);
		return $this->db->update('team', $data);
	}

	public function delete($id)
	{
		$procedure = "CALL teamdelete(?)";
		return $this->db->query($procedure, $id);
	}
}
                        
/* End of file Team_model.php */
