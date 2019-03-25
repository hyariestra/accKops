<?php 

class M_voucher extends CI_model
{
	
	function tampil_voucher()
	{
		$ambil=$this->db->get('voucher');
		$pecahdata=$ambil->result_array();
		return $pecahdata;
	}

	function simpan_voucher($datainputan)
	{
		$datavoc=elements(array('kode_voucher','nominal_voucher'),$datainputan,"-");

		$this->db->insert('voucher',$datavoc);
	}
	function hapus_voucher($kodev)
	{
		$this->db->where('kode_voucher',$kodev);
		$this->db->delete('voucher');
	}
	function ambil_voucher($kodev)
	{
		$hasil=$this->db->get_where('voucher',array('kode_voucher'=>$kodev));
		$pecah=$hasil->row_array();
		return $pecah;
	}
	function ubah_voucher($inputan,$kodev)
	{
		$datavoc=elements(array('kode_voucher','nominal_voucher'),
			$inputan,"-");

			$this->db->where('kode_voucher',$kodev);
			$this->db->update('voucher',$datavoc);
	}
	function cek_voucher($kode)
	{
		$this->db->where("kode_voucher",$kode);
		$ambil=$this->db->get("voucher");

		//menghitung voucher yang ketemu
		$hitung=$ambil->num_rows();
		//jika ada yg lebih besar dari nol
		if ($hitung > 0)
		 {
		//maka dikirimkan nomila vouchernya
		 	$pecah=$ambil->row_array();
		 	return $pecah['nominal_voucher'];
		}
	}
}
 ?>
