<?php 

/**

* 

*/

class main extends CI_controller

{

	

	function __construct()

	{

		parent::__construct();

		if (!$this->session->userdata("pengguna"))

		 {

			$this->load->view("login");

		}

	}

	function index()

	{
		

		$data['judul']="selamat datang"; 

		$this->load->model("M_admin");

		$data['admin']=$this->M_admin->tampil_admin();
		
		$this->themeadmin->tampilkan("dashboard",$data);


	}

}





 ?>