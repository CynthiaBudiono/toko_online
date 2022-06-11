<?php

class Order_model extends CI_Model {

    public function getallopen() {
		$this->db->select('order.*');
		$query = $this->db->get('order');

		if ($query->num_rows() > 0)

			return $query->result_array();

		else

			return 0;

	}

    public function get($id) {

		$query = $this->db->where('id', $id)->get('order', 1, 0);

		if ($query->num_rows() > 0)

			return $query->result_array();

		else

			return 0;

	}

	public function getlastorder(){

		$query = $this->db->order_by('id', 'DESC')->get('order', 1, 0);

		if ($query->num_rows() > 0)

			return $query->result_array();

		else

			return 0;

	}

	public function getbycurtomer($id_user){
		$this->db->select('order.*, COUNT(order_detail.id) as jumlah_produk');
		$this->db->where('order.id_customer', $id_user);
		$this->db->join('order_detail', 'order_detail.id_order = order.id');
		$this->db->group_by("order.id");
		$query = $this->db->order_by('order.id', 'DESC')->get('order');

		if ($query->num_rows() > 0)

			return $query->result_array();

		else

			return 0;
	}

    public function add($data) {

        $this->db->trans_start();

        $this->db->insert('order',$data);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;

    }

    public function update($data) {

		$array = array('id'=>$data['id']);

		$this->db->where($array)->update('order', $data);

    }

    public function delete($id) {

		$this->db->where('id = '.$id)->delete('order');
	}
}