<?php if (!defined('BASEPATH')) { exit('No direct script access allowed');}

class Auth extends CI_Controller
{
    public function index() {
       
        // $this->load->library('form_validation');
        if ($this->session->userdata('logged_in')) {
            redirect('produk');
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
                        
                        redirect('produk');
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

		$this->load->view('content/produk', $data);

        $this->load->view('general/footer', $data);
    }

    public function logout(){

        $this->session->sess_destroy();

        redirect('login');
    }
}
