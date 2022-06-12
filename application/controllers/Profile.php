<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('msg','Login dulu');
			redirect('home');
		}
	}

	public function index()
	{

		$this->load->model('general_model');
		$this->load->model('user_model');

		$data['detil'] = $this->user_model->get($this->session->userdata('user_id'));

		$data['logo'] = $this->general_model->get(1)[0]['nilai'];
		
		$this->load->view('general/header', $data);

        $this->load->view('general/navbar', $data);

		$this->load->view('content/profile', $data);

        $this->load->view('general/footer', $data);
	}

    public function update()
	{
		$this->load->model('user_model');

        $data = array(
            'id' => $this->session->userdata('user_id'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
        );

        $this->user_model->update($data);
        $this->session->set_flashdata('msg','Berhasil Mengubah data profile');
		redirect('home');
	}
}