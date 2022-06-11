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

	public function getwithjoin($id){
		$this->db->select('order.*, user.nama as nama_user, user.email, user.no_hp');
		$this->db->join('user', 'user.id = order.id_customer');
		$query = $this->db->where('order.id', $id)->get('order', 1, 0);

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