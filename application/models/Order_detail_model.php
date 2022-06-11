<?php

class order_detail_model extends CI_Model {

    public function getallopen() {
		$this->db->select('order_detail.*');
		$query = $this->db->get('order_detail');

		if ($query->num_rows() > 0)

			return $query->result_array();

		else

			return 0;

	}

	public function getbyidorder($id) {
		$this->db->select('order_detail.*, produk.nama as nama_produk, produk.harga, produk.foto');
        $this->db->join('produk', 'produk.id = order_detail.id_produk');

        $this->db->where('order_detail.id_order', $id);

		$query = $this->db->get('order_detail');

		if ($query->num_rows() > 0)

			return $query->result_array();

		else

			return 0;

	}

    public function get($id) {

		$query = $this->db->where('id', $id)->get('order_detail', 1, 0);

		if ($query->num_rows() > 0)

			return $query->result_array();

		else

			return 0;

	}

    public function add($data) {

        $this->db->trans_start();

        $this->db->insert('order_detail',$data);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;

    }

    public function update($data) {

		$array = array('id'=>$data['id']);

		$this->db->where($array)->update('order_detail', $data);

    }

    public function delete($id) {

		$this->db->where('id = '.$id)->delete('order_detail');
	}
}