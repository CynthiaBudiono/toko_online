<?php

class Produk_model extends CI_Model {

    public function getallopen() {
		$this->db->select('produk.*');
		$this->db->where('status', 1);
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

	public function getorderbyjumlah($jumlah_data){
		$this->db->where('stok > 0');
		$this->db->where('status', 1);
		$query = $this->db->order_by('stok', 'ASC')->get('produk', $jumlah_data);

		if ($query->num_rows() > 0)

			return $query->result_array();

		else

			return 0;
	}

	public function update($data) {

		$array = array('id'=>$data['id']);

		$this->db->where($array)->update('produk', $data);

    }
}