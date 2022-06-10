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

		$this->load->view('general/navbar', $data);

		$this->load->view('content/produk', $data);

		$this->load->view('general/footer', $data);
	}

    public function detils($id = null){
        $id = base64_decode($id);

        $this->load->model('produk_model');

		$res = $this->produk_model->get($id);

        // if ($res == 0) redirect('home');

        $data['detil'] = $res;

        $this->load->model('general_model');
		
		$data['logo']=$this->general_model->get(1)[0]['nilai'];

		$this->load->view('general/header');

		$this->load->view('general/navbar', $data);

		$this->load->view('content/produk-detail', $data);

		$this->load->view('general/footer', $data);

    }
}