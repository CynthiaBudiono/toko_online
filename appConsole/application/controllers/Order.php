<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{

		$this->load->model('order_model');

		$data['order'] = $this->order_model->getallopen();

		$data['title'] = "Order";
        
        $this->load->model('general_model');
		
		$data['logo']=$this->general_model->get(1)[0]['nilai'];

		$this->load->view('general/header');

		$this->load->view('general/sidebar', $data);

		$this->load->view('general/navbar', $data);

		$this->load->view('content/order', $data);

		$this->load->view('general/footer', $data);
	}

    public function view($id)
	{

		$this->load->model('order_model');
        $this->load->model('order_detail_model');

        $id = base64_decode($id);

        $data['order'] = $this->order_model->getwithjoin($id);

		$data['order_detail'] = $this->order_detail_model->getbyidorder($id);

		$data['title'] = "Order";
        
        $this->load->model('general_model');
		
		$data['logo']=$this->general_model->get(1)[0]['nilai'];

		$this->load->view('general/header');

		$this->load->view('general/sidebar', $data);

		$this->load->view('general/navbar', $data);

		$this->load->view('content/order_detail', $data);

		$this->load->view('general/footer', $data);
	}
    
}