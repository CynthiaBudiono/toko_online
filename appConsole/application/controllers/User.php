<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{

		$this->load->model('user_model');

		$data['user'] = $this->user_model->getallopen();

		$data['title'] = "User";
        
        $this->load->model('general_model');
		
		$data['logo']=$this->general_model->get(1)[0]['nilai'];

		$this->load->view('general/header');

		$this->load->view('general/sidebar', $data);

		$this->load->view('general/navbar', $data);

		$this->load->view('content/user', $data);

		$this->load->view('general/footer', $data);
	}

    // public function adds(){

    //     $data['title'] = "Add User";

    //     $this->load->model('general_model');
        
    //     $data['logo']=$this->general_model->get(1)[0]['nilai'];

    //     $this->load->view('general/header');

    //     $this->load->view('general/sidebar', $data);

    //     $this->load->view('general/navbar', $data);

    //     $this->load->view('content/user-add', $data);

    //     $this->load->view('general/footer', $data);

    // }

    public function updates($id){

        $id = base64_decode($id);

        $this->load->model('user_model');

		$res = $this->user_model->get($id);
        
        $data['detil'] = $res;
        
        $data['title'] = "Edit User";

        $this->load->model('general_model');
        
        $data['logo']=$this->general_model->get(1)[0]['nilai'];

        $this->load->view('general/header');

        $this->load->view('general/sidebar', $data);

        $this->load->view('general/navbar', $data);

        $this->load->view('content/user-add', $data);

        $this->load->view('general/footer', $data);

    }

    public function update(){
        $data = array(
            'id' => $this->input->post('iduser'),
            'nama' => $this->input->post('nama'),
            'tipe' => 'customer',
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
        );

        $this->load->model('user_model');
        
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('nama', 'nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $detil[0] = $data;
            echo validation_errors();
        }
        else {
            $this->load->helper(array('form', 'url'));

            $this->user_model->update($data);

            redirect('user');
        }
    }
}