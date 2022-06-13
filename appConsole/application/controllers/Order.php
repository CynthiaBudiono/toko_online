<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) redirect("login");
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

	public function updates($id){
		$id = base64_decode($id);

		$this->load->model('order_model');

		$data['detil'] = $this->order_model->getwithjoin($id);

		$data['title'] = "Update";

		$this->load->model('general_model');
		
		$data['logo']=$this->general_model->get(1)[0]['nilai'];

		$this->load->view('general/header');

		$this->load->view('general/sidebar', $data);

		$this->load->view('general/navbar', $data);

		$this->load->view('content/order-add', $data);

		$this->load->view('general/footer', $data);
	}
    
	public function update(){
        $data = array(
            'id' => $this->input->post('idorder'),
            'nama_pemesanan' => $this->input->post('nama_pemesanan'),
            'alamat_pengiriman' => $this->input->post('alamat_pengiriman')
        );

        $this->load->model('order_model');
        
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('nama_pemesanan', 'Nama Pemesan', 'required');
        $this->form_validation->set_rules('alamat_pengiriman', 'Alamat Pengiriman', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $detil[0] = $data;
            echo validation_errors();
        }
        else {
            $this->load->helper(array('form', 'url'));

			$get = $this->order_model->get($data['id']);

			$this->order_model->update($data);

            if((!empty($_FILES)) && !empty($_FILES['foto_bukti_pembayaran']['name'])) {
				$this->load->helper(array('form', 'url'));
	            $nama_foto = "pembayaran-".$data['id']."-".date('YmdHis');
		        $config['upload_path']          = './../assets/images/bukti_pembayaran';
		        $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
		        $config['file_name']            = $nama_foto;
		        $config['overwrite']            = true;

		       	$this->load->library('upload', $config);
		        $this->upload->initialize($config);


			  	if ( ! $this->upload->do_upload('foto_bukti_pembayaran')){
                    echo $this->upload->display_errors();
	            }
                else{
	                $name_foto_bukti_pembayaran = $this->upload->data('file_name');
                    unlink('./../assets/images/bukti_pembayaran'.$get[0]['foto']);
	            }

                $data_insert = array(
                    "id" => $data['id'],
                    "bukti_pembayaran" => $name_foto_bukti_pembayaran
                );

                $this->order_model->update($data_insert);
	        }

            redirect('order');
        }
    }
}