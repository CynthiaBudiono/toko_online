<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect("login");
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

    public function adds(){

        $data['title'] = "Add Produk";

        $this->load->model('general_model');
        
        $data['logo']=$this->general_model->get(1)[0]['nilai'];

        $this->load->view('general/header');

        $this->load->view('general/sidebar', $data);

        $this->load->view('general/navbar', $data);

        $this->load->view('content/produk-add', $data);

        $this->load->view('general/footer', $data);

    }

    public function updates($id){

        $id = base64_decode($id);

        $this->load->model('produk_model');

		$res = $this->produk_model->get($id);
        
        $data['detil'] = $res;
        
        $data['title'] = "Edit produk";

        $this->load->model('general_model');
        
        $data['logo']=$this->general_model->get(1)[0]['nilai'];

        $this->load->view('general/header');

        $this->load->view('general/sidebar', $data);

        $this->load->view('general/navbar', $data);

        $this->load->view('content/produk-add', $data);

        $this->load->view('general/footer', $data);

    }

    public function add(){

        $data = array(
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'status' => (($this->input->post('status')=='on') ? 1 : 0),
            'keterangan' => $this->input->post('keterangan'),
            "created" => date('Y-m-d H:i:s')
        );

        $this->load->model('produk_model');
        
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == FALSE) {
            $detil[0] = $data;
            echo validation_errors();
        }
        else {
            $this->load->helper(array('form', 'url'));

            $this->produk_model->add($data);

            $last_produk = $this->produk_model->getlastproduk();

            if((!empty($_FILES)) && !empty($_FILES['foto_produk']['name'])) {
				$this->load->helper(array('form', 'url'));
	            $nama_foto = "Produk-".$last_produk[0]['id']."-".date('YmdHis');
		        $config['upload_path']          = './../assets/images/produk';
		        $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
		        $config['file_name']            = $nama_foto;
		        $config['overwrite']            = true;

		       	$this->load->library('upload', $config);
		        $this->upload->initialize($config);


			  	if ( ! $this->upload->do_upload('foto_produk')){
                    echo $this->upload->display_errors();
	            }
                else{
	                $name_foto_produk = $this->upload->data('file_name');
	            }

                $data_insert = array(
                    "id" => $last_produk[0]['id'],
                    "foto" => $name_foto_produk
                );

                $this->produk_model->update($data_insert);
	        }

            redirect('produk');
        }
    }

    public function update(){
        $data = array(
            'id' => $this->input->post('idproduk'),
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'status' => (($this->input->post('status')=='on') ? 1 : 0),
            'keterangan' => $this->input->post('keterangan'),
            "updated" => date('Y-m-d H:i:s')
        );

        $this->load->model('produk_model');
        
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == FALSE) {
            $detil[0] = $data;
            echo validation_errors();
        }
        else {
            $this->load->helper(array('form', 'url'));

            $get = $this->produk_model->get($data['id']);

            $this->produk_model->update($data);

            if((!empty($_FILES)) && !empty($_FILES['foto_produk']['name'])) {
				$this->load->helper(array('form', 'url'));
	            $nama_foto = "Produk-".$get[0]['id']."-".date('YmdHis');
		        $config['upload_path']          = './../assets/images/produk';
		        $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
		        $config['file_name']            = $nama_foto;
		        $config['overwrite']            = true;

		       	$this->load->library('upload', $config);
		        $this->upload->initialize($config);


			  	if ( ! $this->upload->do_upload('foto_produk')){
                    echo $this->upload->display_errors();
	            }
                else{
	                $name_foto_produk = $this->upload->data('file_name');
                    unlink('./../assets/images/produk'.$get[0]['foto']);
	            }

                $data_insert = array(
                    "id" => $get[0]['id'],
                    "foto" => $name_foto_produk
                );

                $this->produk_model->update($data_insert);
	        }

            redirect('produk');
        }
    }
}