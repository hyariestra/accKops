<?php 



/**

* 

*/

class Kategori extends CI_controller

{

	//fungsi yg otomasti berjalan

	function __construct()

	{

	//menggabungkan class kita dengan class utama CI

		parent::__construct();

		$this->load->model("M_produk");

		$this->load->model("M_kategori");

		$this->load->model("M_halamanstatis");

	}

	function produk($id)

	{

		$data['judul']="Kategori Produk";

		//mendapatkan data kategori produk dari fungsi tampil_produk_kategori (id_kategorinya)

		$data['kategoriproduk']=$this->M_produk->tampil_produk_kategori($id);

		$data['halamanstatis']=$this->M_halamanstatis->tampil_halamanstatis();

		$data['kategori']=$this->M_kategori->tampil_kategori();
		$data['kategorimotor']=$this->M_kategori->tampil_kategori_motor($id);
 		$data['kategorimobil']=$this->M_kategori->tampil_kategori_mobil($id);
 		$data['kategoriakses']=$this->M_kategori->tampil_kategori_akses($id);


		$this->load->view("kategori",$data);

	}



}



?>