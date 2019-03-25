<?php 

/**

* 

*/

class Produk extends CI_controller

{

	

	function __construct()

	{

		parent::__construct();

		$this->load->model("M_produk");

		$this->load->model("M_kategori");

		$this->load->model("M_keranjang");

		$this->load->model("M_komentar");

		$this->load->model("M_slider");

		$this->load->model("M_halamanstatis");

		$this->load->helper('text');

	}

	



	function detail($id)

	{

		//ambil data produk berdasar id di URL

		$data['detail']=$this->M_produk->ambil_produk($id);

		$data['halamanstatis']=$this->M_halamanstatis->tampil_halamanstatis();

		$data['kategori']=$this->M_kategori->tampil_kategori($id);
		$data['kategorimotor']=$this->M_kategori->tampil_kategori_motor($id);
 		$data['kategorimobil']=$this->M_kategori->tampil_kategori_mobil($id);
 		$data['kategoriakses']=$this->M_kategori->tampil_kategori_akses($id);

		$data['judul']="Detail Produk";

		

		$data['komentar']=$this->M_komentar->tampil_komentar_produk($id,"published");



		$this->load->view("detailproduk",$data);



		//beli produk

		$inputan=$this->input->post();

		// if ($inputan) 

		if ($this->input->post("beli")) 

		{

			if ($inputan['jumlah'] > $data['detail']['stok_produk']) 

			{

				$isipesan="<br><div class='alert alert-danger'>Stok produk yang kamu beli tidak mencukupi, silahkan hubungi admin </div>";

				$this->session->set_flashdata("pesan",$isipesan);

				redirect("produk/detail/$id");

			}

			else
			{
			$this->M_keranjang->tambah_produk($id,$inputan['jumlah']);
			//tampilkan pesan produk yg dibeli
			$isipesan="<br><div class='alert alert-info'>Produk sudah masuk ke keranjang</div>";
			//dalam session pesan menyimpan var $isipesan
			$this->session->set_flashdata("pesan",$isipesan);
			redirect("produk/detail/$id");
			}
		}
		//simpan komentar
		if ($this->input->post("kirim"))

		 {

		$this->M_komentar->simpan_komentar($this->input->post("isi_komentar"),$id);

		$isipesan="<br><div class='alert alert-info'>Terima kasih , pesan akan dimoderasi</div>";



			//dalam session pesan menyimpan var $isipesan

			$this->session->set_flashdata("pesan",$isipesan);

			redirect("produk/detail/$id");

		}





	}

	function cari()

	{

		//ambl keyword yang diinputkan

		$inputan=$this->input->post("keyword");

		//memanggil model mproduk

		$this->load->model("M_produk");

		//model m_produk menjalankan fungsi cari_produk()

		$data['pencarian']=$this->M_produk->cari_produk($inputan);

		$data['halamanstatis']=$this->M_halamanstatis->tampil_halamanstatis();

		$data['judul']="Cari Produk";

		$this->load->view("pencarian",$data);

	}

	function index($page=1)

	{	



		$this->load->model("M_kategori");

		$this->load->model("M_keranjang");

		$this->load->model("M_produk");

		





		//cari batas

		$batas=6;

		//cari posisi

		$posisi=($page-1)*$batas;

		$data['halamanstatis']=$this->M_halamanstatis->tampil_halamanstatis();

		$data['kategori']=$this->M_kategori->tampil_kategori();
		$data['kategorimotor']=$this->M_kategori->tampil_kategori_motor();
 		$data['kategorimobil']=$this->M_kategori->tampil_kategori_mobil();
 		$data['kategoriakses']=$this->M_kategori->tampil_kategori_akses();

		$data['produk']=$this->M_produk->tampil_produk($posisi,$batas);



		$data['judul']="Produk";



		//hitung total data 

		$banyakdata=count($this->M_produk->tampil_produk());

		//page didapat dari total data dibagi batas dan dibulatkan 

		$data['page']=ceil($banyakdata/$batas);

		$data['slider']=$this->M_slider->tampil_slider();

		$this->load->view("produk",$data);

	}

}



// print_r($this->input->post("kata_kunci"));



 ?>