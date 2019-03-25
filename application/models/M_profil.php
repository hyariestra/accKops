<?php 
/**
* 
*/
class M_profil extends CI_model
{
	function ambil_pelanggan($id)
	{
		// mengambil data 1 pelanggan yg id_pelanggan nya ada di url
		//select*from pelanggan where id_pelanggan='$id'
		$hasil=$this->db->get_where('pelanggan',array('id_pelanggan'=>$id));
		//mecah ke array 1 data pelanggan
		$pecah = $hasil->row_array();
		//mengembalikan nilai karena mau menampilkan di tempat lain
		return $pecah;
	}
	
	function tampil_pelanggan()
	{
		$pelanggan=$this->session->userdata("pelanggan");
		$this->db->where("id_pelanggan");
		$ambil=$this->db->get("pelanggan");
		$pecah= $ambil->result_array();
		return $pecah;
	}

	function ubah_profil($inputan,$id)
	{

		if (!empty($inputan['password_pelanggan']))
		{
			$inputan['password_pelanggan']=sha1(md5($inputan['password_pelanggan']));
			$dataadm=elements(array('password_pelanggan','nama_pelanggan','telepon_pelanggan'),
				$inputan,"-");

		}
		else
		{

			$dataadm=elements(array('nama_pelanggan','telepon_pelanggan'),
				$inputan,"-");
		}


		$this->db->where('id_pelanggan',$id);
		$this->db->update('pelanggan',$dataadm);
	}
}


?>