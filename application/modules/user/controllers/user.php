<?php 

/**

* 

*/

class user extends CI_controller

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
		

		$this->load->view("login");


	}

	function login()
	{

		$this->load->model("M_pengguna");
		//skrip login
		$inputan=$this->input->post();
		if ($inputan)
		 {
			$hasil=$this->M_pengguna->login_pengguna($inputan);
			if ($hasil=="sukses") 
			{
				$isipesan="<br><div class='alert alert-info'>Login sukses</div>";
			$this->session->set_flashdata("pesan",$isipesan);
			$_SESSION['ses_admin']="admin";
			$_SESSION['ses_kcfinder']=array();
			$_SESSION['ses_kcfinder']['disabled'] = false;
			$_SESSION['ses_kcfinder']['uploadURL'] = "../content_upload";

			echo "<script>window.location='".base_url()."main';</script>";
			
			}
			else
			{
			$isipesan="<br><div class='alert alert-danger'>Username atau Password salah!</div>";
			$this->session->set_flashdata("pesan",$isipesan);
			$this->load->view("login");
			}
		}

	}


	function logout()
	{
		$this->session->unset_userdata("pengguna");
		$this->load->view("login");
	}

}





 ?>