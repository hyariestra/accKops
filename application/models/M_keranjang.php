<?php 
/**
* 
*/
class M_keranjang extends CI_model
{
	
	function tambah_produk($id,$jumlah)
	{
		if ($this->session->userdata("keranjang")) 
		{
			//menyimpan keranjang belanja yang lama
			$keranjanglama=$this->session->userdata("keranjang");

			//memasukan produk yang baru dubeli ke keranjang belanja yang lama
			$keranjanglama[$id]=$jumlah;
			$this->session->set_userdata("keranjang",$keranjanglama);
		}
		//selain itu (blm ada keranjang belanja)
		else
		{
			//membuat keranjang belanja dgn isi produk yg pertama dibeli
			//masukan produk ke keranjang belanja
			$this->session->set_userdata("keranjang",array($id=>$jumlah));
		}
	}
	function tampil_keranjang()
	{
		//mendapatkan session dulu
		$keranjang=$this->session->userdata("keranjang");
		//jika keranjangan ada
		if ($keranjang) {
			
		//memperulangakn array keranjang dgn foreach unt dp id_produk dn jml
			foreach ($keranjang as $id_produk => $jumlahyangdibeli) 
			{
		//amobil data produk
				$this->db->where("id_produk",$id_produk);
				$ambil=$this->db->get("produk");
				$pecah= $ambil->row_array();
			//masuk jumlah yang dibeli ke data produk 
				$pecah['jumlah']=$jumlahyangdibeli;
				$pecah['subtotal']=$pecah['harga_produk']*$jumlahyangdibeli;
			//simpan data prduk dan jumlah yang dibeli dalam array
				$arraybesar[]=$pecah;

			}
		//mengebalikan nilai ke controller 
			return $arraybesar;
		}
		else
		{
			return array();
			
		}
	}
}


?>
