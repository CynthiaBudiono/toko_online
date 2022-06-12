<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
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
		$this->load->model('order_model');

		$data['order'] = $this->order_model->getbycurtomer($this->session->userdata('user_id'));

		$data['logo'] = $this->general_model->get(1)[0]['nilai'];
		$data['tujuan_rekening']=$this->general_model->get(2)[0]['nilai'];
		
		$this->load->view('general/header', $data);

        $this->load->view('general/navbar', $data);

		$this->load->view('content/order', $data);

        $this->load->view('general/footer', $data);
	}

	public function orderan()
	{

		$this->load->model('general_model');
		
		$this->load->model('order_model');

		$data['order'] = $this->order_model->getbycurtomer($this->session->userdata('user_id'));

		$data['mode'] = "order";
		$data['logo'] = $this->general_model->get(1)[0]['nilai'];
		$data['tujuan_rekening']=$this->general_model->get(2)[0]['nilai'];
		
		$this->load->view('general/header', $data);

        $this->load->view('general/navbar', $data);

		$this->load->view('content/order', $data);

        $this->load->view('general/footer', $data);
	}

	public function detils($id){
		$id = base64_decode($id);

		$this->load->model('general_model');
		$this->load->model('order_detail_model');

		$data['order_detail'] = $this->order_detail_model->getbyidorder($id);

		$data['logo'] = $this->general_model->get(1)[0]['nilai'];
		$data['tujuan_rekening']=$this->general_model->get(2)[0]['nilai'];
		
		$this->load->view('general/header', $data);

        $this->load->view('general/navbar', $data);

		$this->load->view('content/order_detail', $data);

        $this->load->view('general/footer', $data);
	}

	public function cart(){
		$this->load->model('produk_model');
		
		$get = $this->produk_model->get($this->input->post("id"));

		$data_cart[] = array(
			'id' => $this->input->post("id"),
			'foto' => $get[0]['foto'],
			'nama' => $get[0]['nama'],
			'harga' => $get[0]['harga'],
			'jumlah' => $this->input->post("jumlah")
		);

		if($this->session->userdata('cart')){
			// var_dump($this->session->userdata('cart')); exit;
			for($i = 0; $i < count($this->session->userdata('cart')); $i++){
				// var_dump($this->session->userdata('cart')); exit;
				if($this->session->userdata('cart')[$i]['id'] != $this->input->post("id")){
					$data_cart[] = array(
						'id' => $this->session->userdata('cart')[$i]['id'],
						'foto' => $this->session->userdata('cart')[$i]['foto'],
						'nama' => $this->session->userdata('cart')[$i]['nama'],
						'harga' => $this->session->userdata('cart')[$i]['harga'],
						'jumlah' => $this->session->userdata('cart')[$i]['jumlah']
					);
				}
			}
		}
		
		$cart = array(
			'cart' => $data_cart
		);

		$this->session->set_userdata($cart);
		
		echo 'sukses';
	}

	public function cartremove(){

		$data_cart = [];
		if($this->session->userdata('cart')){
			for($i = 0; $i < count($this->session->userdata('cart')); $i++){
				if($this->session->userdata('cart')[$i]['id'] != $this->input->post("id")){
					$data_cart[] = array(
						'id' => $this->session->userdata('cart')[$i]['id'],
						'foto' => $this->session->userdata('cart')[$i]['foto'],
						'nama' => $this->session->userdata('cart')[$i]['nama'],
						'harga' => $this->session->userdata('cart')[$i]['harga'],
						'jumlah' => $this->session->userdata('cart')[$i]['jumlah']
					);
				}
			}
		}
		
		$cart = array(
			'cart' => $data_cart
		);

		$this->session->set_userdata($cart);

		echo 'sukses';
	}

    public function checkout()
	{
		$this->load->model('general_model');
		$this->load->model('user_model');

		$data['customer'] = $this->user_model->get($this->session->userdata('user_id'));

		$data['logo']=$this->general_model->get(1)[0]['nilai'];
		$data['tujuan_rekening']=$this->general_model->get(2)[0]['nilai'];
		
		$this->load->view('general/header', $data);

        $this->load->view('general/navbar', $data);

		$this->load->view('content/checkout', $data);

        $this->load->view('general/footer', $data);
	}

	public function orders(){
		$this->load->model('produk_model');
		$this->load->model('order_model');
		$this->load->model('order_detail_model');

		if($this->session->userdata('cart')){

			$data = array(
				'id_customer' => $this->session->userdata('user_id'),
				'nama_pemesanan' => $this->input->post('full_name'),
				'alamat_pengiriman' => $this->input->post('user_address'),
				'keterangan' => $this->input->post('keterangan'),
				"created" => date('Y-m-d H:i:s')
			);
	
			$this->order_model->add($data);

			$getlastorder = $this->order_model->getlastorder();

			$jumlah_pembayaran = 0;

			for($i = 0; $i < count($this->session->userdata('cart')); $i++){
				$data_order_detail = array(
					'id_order' => $getlastorder[0]['id'],
					'id_produk' => $this->session->userdata('cart')[$i]['id'],
					'jumlah' => $this->session->userdata('cart')[$i]['jumlah']
				);

				$this->order_detail_model->add($data_order_detail);

				$jumlah_pembayaran += (int)$this->session->userdata('cart')[$i]['harga'] * (int)$this->session->userdata('cart')[$i]['jumlah'];
				
				//UPDATE STOCK
				$data_stok = array(
					'id' => $this->session->userdata('cart')[$i]['id'],
					'stok' => (int)$this->produk_model->get($this->session->userdata('cart')[$i]['id'])[0]['stok'] - (int)$this->session->userdata('cart')[$i]['jumlah']
				);
				$this->produk_model->update($data_stok);
			}

			$data_update = array(
				'id' => $getlastorder[0]['id'],
				'jumlah_pembayaran' => $jumlah_pembayaran
			);
	
			$this->order_model->update($data_update);

			$cart = array(
				'cart' => []
			);
	
			$this->session->set_userdata($cart);
		}
		redirect('order/orderan');
	}

	public function payment(){
		$this->load->model('order_model');

		if((!empty($_FILES)) && !empty($_FILES['bukti_pembayaran']['name'])) {
            $this->load->helper(array('form', 'url'));
            $nama_bukti_pembayaran = "pembayaran-".$this->input->post('idproduk')."-".date('YmdHis');
            $config['upload_path']          = './assets/images/bukti_pembayaran';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
            $config['file_name']            = $nama_bukti_pembayaran;
            $config['overwrite']            = true;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('bukti_pembayaran')){
                echo $this->upload->display_errors();
            }
            else{
                $name_foto = $this->upload->data('file_name');
            }

            $data_insert1 = array(
                "id" => $this->input->post('idproduk'),
                "bukti_pembayaran" => $name_foto
            );

            $this->order_model->update($data_insert1);
        }

		redirect('order/orderan');
	}
}