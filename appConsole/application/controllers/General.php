<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('general_model');

		$data['title'] = "General";
		
		$data['logo']=$this->general_model->get(1)[0]['nilai'];
        $data['tujuan_rekening']=$this->general_model->get(2)[0]['nilai'];

		$this->load->view('general/header');

		$this->load->view('general/sidebar', $data);

		$this->load->view('general/navbar', $data);

		$this->load->view('content/general', $data);

		$this->load->view('general/footer', $data);
	}

	public function update(){
        $this->load->helper(array('form', 'url'));
        $this->load->model('general_model');

		$data_insert = array(
            "id" => 2,
            "nilai" => $this->input->post('tujuan_rekening')
        );
        $this->general_model->update($data_insert);

        $old_foto = $this->general_model->get(1)[0]['nilai'];

        if((!empty($_FILES)) && !empty($_FILES['logo_web']['name'])) {
            $this->load->helper(array('form', 'url'));
            $nama_logo = "logo-".date('YmdHis');
            $config['upload_path']          = './../assets/images/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
            $config['file_name']            = $nama_logo;
            $config['overwrite']            = true;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('logo_web')){
                echo $this->upload->display_errors();
            }
            else{
                $name_foto_logo = $this->upload->data('file_name');

                unlink('./../assets/images/'.$old_foto);
            }

            $data_insert1 = array(
                "id" => 1,
                "nilai" => $name_foto_logo
            );

            $this->general_model->update($data_insert1);
        }

        redirect('general');
        
	}
}