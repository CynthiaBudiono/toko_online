<?php

class General_model extends CI_Model {

    public function getallopen() {
		$this->db->select('general.*');

		$query = $this->db->get('general');

		if ($query->num_rows() > 0)

			return $query->result_array();

		else

			return 0;

	}

  public function get($id) {

		$query = $this->db->where('id', $id)->get('general', 1, 0);

		if ($query->num_rows() > 0)

			return $query->result_array();

		else

			return 0;

	}

    public function getnama($nama) {
        $query = $this->db->where('LOWER(nama)', strtolower($nama))->get('general', 1, 0);
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return 0;
    }
}