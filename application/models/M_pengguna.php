<?php 

/**

* 

*/

class M_pengguna extends CI_model

{

	

	function login_pengguna($inputan)

	{

		$em = $inputan['email'];

		$pass = md5($inputan['password']);



		//cek akun

		$this->db->where("email",$em);

		$this->db->where("password",$pass);

		$cek = $this->db->get("admin");



		$hitung = $cek->num_rows(); //menghitung ada berapa akun yang tercek



		//jikan akun benar leboh besar dari 0



		//jika akun benar > 0 

		if ($hitung > 0)

		 {

			$ambil=$cek->row_array(); //mengambil data login

			$this->session->set_userdata("pengguna",$ambil); //daftarkan ke session

			return "sukses";

		}

		//selain  itu (akun benar tidak lebih dari nol)

		else

		{

			return "gagal";

		}



	}

}





 ?>