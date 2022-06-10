<?php

class Produk_model extends CI_Model {

    public function getallopen() {
		$this->db->select('produk.*');
		$query = $this->db->get('produk');

		if ($query->num_rows() > 0)

			return $query->result_array();

		else

			return 0;

	}

    public function get($id) {

		$query = $this->db->where('id', $id)->get('produk', 1, 0);

		if ($query->num_rows() > 0)

			return $query->result_array();

		else

			return 0;

	}

    public function add($data) {

        $this->db->trans_start();

        $this->db->insert('produk',$data);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;

    }

    public function update($data) {

		$array = array('id'=>$data['id']);

		$this->db->where($array)->update('produk', $data);

    }

    public function delete($id) {

		$this->db->where('id = '.$id)->delete('produk');
	}
}