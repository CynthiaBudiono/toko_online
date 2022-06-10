<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{

		$this->load->model('general_model');
		
		$data['logo']=$this->general_model->get(1)[0]['nilai'];
		
		$this->load->view('general/header');

		$this->load->view('general/login', $data);
	}
}