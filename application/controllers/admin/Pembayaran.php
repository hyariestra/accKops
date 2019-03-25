<?php 

/**

* 

*/

class Pembayaran extends CI_controller

{

	

	function __construct()

	{

		parent::__construct();

		if (!$this->session->userdata("pengguna"))

		 {

			redirect("admin/pengguna/login");

		}

		$this->load->model("M_pembayaran");

	}

	function detail($id)

	{

		$data['pembayaran']=$this->M_pembayaran->ambil_pembayaran($id);

		$data['judul']="Informasi Pembayaran";

		$this->themeadmin->tampilkan("admin/detailpembayaran",$data);

	}

	

	function terima($id)

	{

		//memanggil model pembelian

		$this->load->model("M_pembelian");

		$this->load->model("M_produk");

		//mengambil produk2 yang dibeli dipembelian itu

		$detail=$this->M_pembelian->detail_pembelian($id);

		foreach ($detail as $key => $value) {

			$this->M_produk->kurangi_stok($value['id_produk'],$value['jumlah_beli']);

		}

		//menjalankan fungsi lunas_pembelian($id)

		$this->M_pembelian->lunas_pembelian($id);

		redirect("admin/pembelian/tampil");

	}

}







 ?>