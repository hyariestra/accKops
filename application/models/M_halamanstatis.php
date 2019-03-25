<?php 
/**
* 
*/
class M_halamanstatis extends CI_model
{
	
	function tampil_halamanstatis()
	{
		$ambil=$this->db->get("halamanstatis");
		$pecahdata=$ambil->result_array();
		return $pecahdata;
	}
	function simpan_halamanstatis($datainputan)
	{
		$datahal=elements(array('judul','isi'),$datainputan,"-");

		$this->db->insert('halamanstatis',$datahal);
	}
	function ambil_halamanstatis($id)
	{
		$this->db->where('id_halaman',$id);
		$query= $this->db->get("halamanstatis");
		$pecah = $query->row_array();
		return $pecah;

	}
	function ubah_halamanstatis($inputan,$id)
	{
		$datapeng=elements(array('judul','isi'),
			$inputan,"-");

		$this->db->where('id_halaman',$id);
		$this->db->update('halamanstatis',$datapeng);
	}
	
}



 ?>