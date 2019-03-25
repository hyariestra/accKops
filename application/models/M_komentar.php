<?php 
/**
* 
*/
class M_komentar extends CI_model
{
	
	function tampil_komentar_produk($id,$status)
	{
		$this->db->select('*');
		$this->db->join('pelanggan','komentar.id_pelanggan=pelanggan.id_pelanggan');
		$this->db->where("id_produk",$id);
		$this->db->where("status_komentar",$status);
		$ambil=$this->db->get("komentar");
		return $ambil->result_array();

	}
	function tampil_komentar()
	{
		$this->db->select('*');
		$this->db->join('pelanggan','komentar.id_pelanggan=pelanggan.id_pelanggan');
		$this->db->join('produk','komentar.id_produk=produk.id_produk');
		$ambil=$this->db->get("komentar");
		return $ambil->result_array();
	}
	function simpan_komentar($isi_komentar,$id)
	{
	$data['isi_komentar']=$isi_komentar;
	$pel=$this->session->userdata("pelanggan");
	$data['id_pelanggan'] =$pel['id_pelanggan']; 
	$data['tanggal_komentar']=date("Y-m-d H:i:s");
	$data['status_komentar']='draft';
	$data['id_produk']=$id;

	$this->db->insert("komentar",$data);
	}

	function publikasi_komentar($id)
	{
		$data['status_komentar']="published";
		$this->db->where('id_komentar',$id);
		$this->db->update('komentar',$data);
	}
	function hapus_komentar($id)
	{
		$this->db->where('id_komentar',$id);
		$this->db->delete('komentar');
	}
	function ambil_komentar($id)
	{
		$this->db->select('*');
		$this->db->join('pelanggan','komentar.id_pelanggan=pelanggan.id_pelanggan');
		$this->db->join('produk','komentar.id_produk=produk.id_produk');
		$this->db->where("id_komentar",$id);
		$ambil=$this->db->get("komentar");
		return $ambil->row_array();
	}
	function simpan_balasan($inputan,$id)
	{
		$data['balas_komentar']=$inputan;
		$this->db->where('id_komentar',$id);
		$this->db->update('komentar',$data);
	}


}
?>