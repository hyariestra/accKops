<?php 

/**

* 

*/

class Dashboard extends CI_Controller

{

	

	function __construct()

	{

		parent::__construct();

	
		if (!$this->session->userdata("pengguna"))

		 {

			redirect("pengguna/login");

		}

	}
	
	function index()

	{

		$data['judul']="selamat datang"; 

	

		$this->themeadmin->tampilkan("dashboard",$data);

	}

}





 ?>