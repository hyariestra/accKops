<?php 

/**
* 
*/
class M_pelanggan extends CI_model
{
	
	function tampil_pelanggan()
	{
		// fungsi ini bertugas mengambil data ke tbl pelanggan, lalu mengirimkan ke controller
		// 1. ambil data
		$ambil=$this->db->get("pelanggan");

		// 2. memecah data ke array karena datanya banyak
		$pecahdata = $ambil->result_array();

		// 3. mengirim data ke controller
		return $pecahdata;
	}

	function simpan_pelanggan($datainputan)
	{
		//enkripsi

		$email=$datainputan['email_pelanggan'];
		$this->db->where("email_pelanggan",$email);
		$ambil=$this->db->get("pelanggan");
		$yangsama=$ambil->num_rows();
		if ($yangsama)
		 {
			return "gagal";
		}
		else
		{
			
		$datainputan['password_pelanggan']=sha1(md5($datainputan['password_pelanggan']));
		//menyiapkan array yg mau disimpan ke table pelanggan
		$datapel=elements(array('nama_pelanggan','email_pelanggan','password_pelanggan','alamat_pelanggan','telepon_pelanggan'),
			$datainputan,"-");

		//menyimpan ke tabel pelanggan 
		$this->db->insert('pelanggan',$datapel);
		return "sukses";
		}



	}
	function hapus_pelanggan($id)
	{
		$this->db->where('id_pelanggan',$id);
		$this->db->delete('pelanggan');
	}

	function ambil_pelanggan($id)
	{
		// mengambil data 1 pelanggan yg id_pelanggan nya ada di url
		//select*from pelanggan where id_pelanggan='$id'
		$hasil=$this->db->get_where('pelanggan',array('id_pelanggan'=>$id));
		//=> artinya mempunyai nilai
		//mecah ke array 1 data pelanggan
		$pecah = $hasil->row_array();
		//mengembalikan nilai karena mau menampilkan di tempat lain
		return $pecah;
	}
	function ubah_pelanggan($inputan,$id)
		{
			$datapel=elements(array('nama_pelanggan','email_pelanggan','password_pelanggan','alamat_pelanggan','telepon_pelanggan'),
			$inputan,"-");

			$this->db->where('id_pelanggan',$id);
			$this->db->update('pelanggan',$datapel);
		}	
	function login_pelanggan($inputan)
	{
		$inputan['password_pelanggan']=sha1(md5($inputan['password_pelanggan']));
		//1. ambil email pelanggan
		$email=$inputan['email_pelanggan'];
		//2. ambil pw pelanggan
		$pass=$inputan['password_pelanggan'];

		//3. querynya
		$this->db->where("email_pelanggan",$email);
		$this->db->where("password_pelanggan",$pass);
		$cek=$this->db->get("pelanggan");

		//4. hitung data yng tercek
		$hitung=$cek->num_rows();
		//5. jika hitung yang tercek lebih besar dari 0 (ada 1 akun yg cocok)
		if ($hitung > 0)
		 {
		//sukses login
		 	//a. memecah akun org yg login
		 	$pecah=$cek->row_array();
		 	//b. memasukan ke session pelanggan
		 	$this->session->set_userdata("pelanggan",$pecah);
		 	return "sukses";
		}
		else
		 {
		 return"gagal";
		}


	}


}

?>