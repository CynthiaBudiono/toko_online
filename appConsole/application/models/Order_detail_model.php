<?php

class Order_detail_model extends CI_Model {

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
}