<?php 



/**

* 

*/

class Admin extends CI_controller

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

		$data['judul']="Daftar admin";

		$this->load->model("M_admin");

		$data['admin']=$this->M_admin->tampil_admin();



		$this->themeadmin->tampilkan('admin/tampiladmin',$data);

	}

	function ubah($id)

	{

		$this->load->model("M_admin");



		$inputan=$this->input->post();

		if ($inputan) 

		{

			$this->M_admin->ubah_admin($inputan,$id);

			redirect('admin/admin/tampil');

		}

		$data['judul']="Data Admin";

		$data['admin']=$this->M_admin->ambil_admin($id);

		$this->themeadmin->tampilkan("admin/ubahadmin",$data);

	}

}



 ?>