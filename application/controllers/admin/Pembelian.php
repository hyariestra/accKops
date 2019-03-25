<?php 



/**

* 

*/

class Pembelian extends CI_controller

{

	function __construct()

	{

		parent::__construct();

		//jika blm login, maka di redirect ke pengguna/login untk login

		//jk tdk ada session pengguna, maka dilarikan ke login\

		if (!$this->session->userdata("pengguna"))

		 {

			redirect("admin/pengguna/login");

		}

	}

	function tampil()

	{

		$data['judul']="Data Pembelian";

		$this->load->model('M_pembelian');



		//cek pembelian lewat batas atau tidak. jika iya status batal

		$this->M_pembelian->cek_pembelian();



		$data['datapembelian']= $this->M_pembelian->tampil_pembelian();

		$this->themeadmin->tampilkan('admin/tampilpembelian',$data);

	}

	function detail($id)

	{

		//ambil data pembelian

		$this->load->model("M_pembelian");

		$data['judul']="Nota Pembelian";

		$data['pembelian']=$this->M_pembelian->ambil_pembelian($id);

		//ambil data produk yg dibeli

		$data['detail']=$this->M_pembelian->detail_pembelian($id);

		$this->themeadmin->tampilkan("admin/detailpembelian",$data);

	}


	function resi($id)

	{
		$this->load->model("M_pembelian");


		$data['pembelian']=$this->M_pembelian->ambil_pembelian2($id);

	//	$data['judul']="Informasi Pembayaran";

		$this->themeadmin->tampilkan("admin/inputresi",$data);

	}

	function resiubah()
	{
		
			$idk = $this->input->post('idresi');
			$data['resi_pengiriman'] = $this->input->post('nomor_resi');
			$data['status_pengiriman'] = $this->input->post('resix');

			$this->db->where("id_pembelian",$idk);
			$this->db->update('pembelian', $data);

			$data['id_pembelian']=$idk;
			$data['flag'] = TRUE;
			//redirect('admin/pembelian/tampil');
			echo json_encode($data);

	}

	function laporan()

	{

		$this->load->model('M_pembelian');

		$data['judul']="Laporan Pembelian";

		$this->themeadmin->tampilkan("admin/laporanpembelian",$data);

	}

	function cetaklaporan()

	{

		$this->load->model("M_pembelian");

		if ($this->input->post())

		 {

			header('Content-type: application/excel');

			$filename = "laporan_pembelian.xls";

			header('Content-Disposition:attachment; filename='.$filename);

			$data['laporan']=$this->M_pembelian->laporan_pembelian($this->input->post());

			$this->load->view("admin/laporanexcel",$data);

		}

	}



}





 ?>