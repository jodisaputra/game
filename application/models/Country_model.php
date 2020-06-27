<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Country_model extends CI_Model
{

	public function list()
	{
		return $this->db->get('country')->result();
	}

	public function listbyid($id)
	{
		$this->db->where('coun_id', $id);
		return $this->db->get('country')->row();
	}

	public function add($data)
	{
		return $this->db->insert('country', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('coun_id', $id);
		return $this->db->update('country', $data);
	}

	public function delete($id)
	{
		$procedure = "CALL countrydelete(?)";
		return $this->db->query($procedure, $id);
	}
}
                        
/* End of file Country_model.php */
