<?php if (!defined('BASEPATH')) { exit('No direct script access allowed');}

class Auth extends CI_Controller
{
    public function index() {
       
        // $this->load->library('form_validation');
        if ($this->session->userdata('logged_in')) {
            redirect('home');
        }

        // $this->form_validation->set_rules('selecttipeuser', 'Tipe', 'min_length[3]|required');

        $this->form_validation->set_rules('username', 'Username', 'min_length[4]|required');

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

        if ($this->form_validation->run() == false) {

            $data['error_msg'] = validation_errors();            
        } 
        else {
            if ($this->form_validation->run() !== false) {

                $this->load->model('user_model');

                $user = $this->user_model->getbyusername($this->input->post('username'));

                if($user){
                    if (md5($this->input->post('password')) == $user[0]['password']) {

                        $data_login = array(
                            'logged_in' => true,
                            'user_type' => $user[0]['tipe'],
                            'user_id' => $user[0]['id'],
                            'username' => $user[0]['username'],
                            'logged_name' => $user[0]['nama']
                        );
                        $this->session->set_userdata($data_login);
                        
                        redirect('home');
                    } 
                    else {
                        $data['error_msg'] = "Invalid username and password!";
                    }
                    
                }
                else {
                    $data['error_msg'] = "User not found";
                }
            }
        }

        $this->load->model('general_model');
		
		$data['logo']=$this->general_model->get(1)[0]['nilai'];
		
		$this->load->view('general/header', $data);

        $this->load->view('general/navbar', $data);

		$this->load->view('content/home', $data);

        $this->load->view('general/footer', $data);
    }

    public function register(){
        $this->load->model('general_model');
		
		$data['logo']=$this->general_model->get(1)[0]['nilai'];
		
		$this->load->view('general/header', $data);

        $this->load->view('general/navbar', $data);

		$this->load->view('general/register', $data);

        $this->load->view('general/footer', $data);
    }

    public function signin(){

        $this->load->model('user_model');

        $get = $this->user_model->getbyusername($this->input->post('username'));

        if(!$get){
            $data = array(
                'username' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'password' => md5($this->input->post('password')),
                'tipe' => 'customer',
                'email' => $this->input->post('email'),
                'created' => date('Y-m-d H:i:s'),
            );
            
            $this->load->helper(array('form', 'url'));

            $this->user_model->add($data);
            $this->session->set_flashdata('msg','Berhasil Register');
            redirect('home');
        }
        else{
            $data['detil'] = array(
                'username' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email')
            );
            $data['error_msg'] =  "Username sudah digunakan";

            $this->load->model('general_model');
		
		    $data['logo']=$this->general_model->get(1)[0]['nilai'];
            
            $this->load->view('general/header', $data);

            $this->load->view('general/navbar', $data);

            $this->load->view('general/register', $data);

            $this->load->view('general/footer', $data);
        }
    }

    public function logout(){

        $this->session->sess_destroy();

        redirect('home');
    }
}
