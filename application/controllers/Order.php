<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect('home');
	}

	public function index()
	{

		$this->load->model('general_model');
		
		$data['logo']=$this->general_model->get(1)[0]['nilai'];
		
		$this->load->view('general/header', $data);

        $this->load->view('general/navbar', $data);

		$this->load->view('content/order', $data);

        $this->load->view('general/footer', $data);
	}

    public function checkout()
	{

		$this->load->model('general_model');
		
		$data['logo']=$this->general_model->get(1)[0]['nilai'];
		
		$this->load->view('general/header', $data);

        $this->load->view('general/navbar', $data);

		$this->load->view('content/checkout', $data);

        $this->load->view('general/footer', $data);
	}
}