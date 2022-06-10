<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{

		$this->load->model('produk_model');

		$data['produk'] = $this->produk_model->getallopen();

		$data['title'] = "Produk";
        
        $this->load->model('general_model');
		
		$data['logo']=$this->general_model->get(1)[0]['nilai'];

		$this->load->view('general/header');

		$this->load->view('general/sidebar', $data);

		$this->load->view('general/navbar', $data);

		$this->load->view('content/produk', $data);

		$this->load->view('general/footer', $data);
	}

    public function updates(){

        $id = $this->input->post('id');

        $this->load->model('produk_model');

		$res = $this->produk_model->get($id);

        $data['detil'] = $res;
        
        $data['title'] = "Edit produk";

        echo json_encode($data);

    }

    public function get(){

        $this->load->model('produk_model');

		$produk = $this->produk_model->getallopen();

        echo json_encode($produk);
    }

    public function add(){

        $data = array(
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'tipe' => 'customer',
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
        );

        // var_dump("masuk add ", $data); exit;

        $this->load->model('produk_model');
        //check validasi
        $this->form_validation->set_data($data);
        // $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('level', 'level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $detil[0] = $data;
            echo validation_errors();
        }
        else {
            $this->load->helper(array('form', 'url'));

            $this->produk_model->add($data);

            echo 'success';
        }
    }

    public function update(){
        $data = array(
            'id' => $this->input->post('id'),
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'tipe' => 'customer',
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
        );

        //check validasi
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('id', 'id', 'required');

        if ($this->form_validation->run() == FALSE) {
            $detil[0] = $data;
            echo validation_errors();
        }
        else {
            $this->load->helper(array('form', 'url'));

            $this->load->model('produk_model');

            $this->produk_model->update($data);

            echo 'success';
        }    
    }
}