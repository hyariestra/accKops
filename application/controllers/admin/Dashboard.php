<?php 

/**

* 

*/

class Dashboard extends CI_controller

{

	

	function __construct()

	{

		parent::__construct();



		if (!$this->session->userdata("pengguna"))

		 {

			redirect("admin/Pengguna/login");

		}

	}

	function index()

	{



		$data['judul']="selamat datang"; 

		

		$this->load->model("M_admin");

		$data['admin']=$this->M_admin->tampil_admin();

		$this->themeadmin->tampilkan("admin/dashboard",$data);



	}

}





 ?>