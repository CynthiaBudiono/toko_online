<?php

class General_model extends CI_Model {
  public function get($id) {

		$query = $this->db->where('id', $id)->get('general', 1, 0);

		if ($query->num_rows() > 0)

			return $query->result_array();

		else

			return 0;

	}

	public function update($data) {

		$array = array('id'=>$data['id']);

		$this->db->where($array)->update('general', $data);

    }
}