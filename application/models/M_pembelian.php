<?php 



/**

* 

*/

class M_pembelian extends CI_model

{



	function generateAutoid(){

		$query=$this->db->query("select id_pembelian from pembelian");

		$max=$query->num_rows()+1;

		$menus= ('PEM-0'.$max);

		return $menus;

	}

	

	function tampil_pembelian()

	{

		$query = $this->db->query("SELECT * FROM pembelian left join pelanggan ON pelanggan.id_pelanggan=pembelian.id_pelanggan order by pembelian.id_pembelian desc");
		
		$pecah=$query->result_array();

		return $pecah;

		

	}

	function tampil_pembelian_pelanggan($idp)

	{

		//select*from pembelian join pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan

		//where id_pelanggan='$idp'

		$this->db->select('*');
		$this->db->select('pembelian.alamat_pelanggan as ken');

		$this->db->from('pembelian');

		$this->db->join('pelanggan', 'pelanggan.id_pelanggan=pembelian.id_pelanggan');

		$this->db->where("pelanggan.id_pelanggan",$idp);

		// $this->db->where('status_pembelian','lunas');

		$query = $this->db->get();

		$pecah=$query->result_array();

		return $pecah;

		

	}

	function ambil_pembelian($id)//untuk detail

	{

		$this->db->select('*');

		$this->db->from('pembelian');

		$this->db->join('pelanggan','pembelian.id_pelanggan=pelanggan.id_pelanggan');

		$this->db->where('id_pembelian',$id);

		$query=$this->db->get("");

		return $query->row_array();

	}
	function ambil_pembelian2($id)
	{
		$query = $this->db->query("SELECT * from pembelian left join pembayaran ON pembelian.id_pembelian=pembayaran.id_pembelian where pembayaran.id_pembelian ='".$id."' ");
		return $query->row_array();
	}

	function detail_pembelian($id)

	{

		$this->db->where('id_pembelian',$id);

		$query=$this->db->get("pembelian_detail");

		return $query->result_array();

	}

	function lunas_pembelian($id)

	{

		//ubah semua status pembelian menjadi lunas

		//update pembelian set status_pembelian='lunas' where id_pembelian='$id'

		$data=array('status_pembelian'=>"lunas");

		$this->db->where("id_pembelian",$id);

		$this->db->update('pembelian',$data);

	}


	function simpan_resi($inputan,$id)

	{

		$inputan['id_pembelian']=$id;

		$simpan=elements(array('kode_pembelian','bukti_pembayaran','tanggal_pembayaran','nama_pembayaran','bank_pembayaran','jumlah_pembayaran','id_pembelian'),$inputan,"-");

		$this->db->insert("pembayaran",$simpan);

		//ubah status pembelian jadi sudah konfirmasi 

		$data=array('status_pembelian'=>"Sudah konfirmasi");

		$this->db->where('id_pembelian',$id);

		$this->db->update('pembelian',$data);

		echo "<pre>";
		echo print_r($dataprod);
		echo "</pre>";

	}



	function simpan_pembelian($inputan,$idpel,$keranjang,$diskon)

	{

		//diskon

		$inputan['potongan_diskon']=$diskon;

		//id_pelanggan yang baru beli

		$inputan['id_pelanggan']=$idpel;

		//dapat tanggal pembelian saat ini

		$inputan['tanggal_pembelian']=date("Y-m-d H:i:s");

		//default status pembelian blm lunas

		$inputan['status_pembelian']="belum lunas";
		$inputan['status_pengiriman']="Pending";
		$inputan['resi_pengiriman']="Belum Ada Resi";

		//mempersiapkan data yang mau disisipkan



		//batas tanggal bayar

		$date = date("Y-m-d");

		$inputan['tanggal_batas_bayar'] = date('Y-m-d', strtotime($date . "+1 days"));



		if ($diskon)

		 {

				$simpan=elements(array('id_pelanggan','kode_pembelian','tanggal_pembelian','status_pembelian','total_pembelian','biaya_pengiriman','total_bayar','alamat_pengiriman','alamat_pelanggan','ekspedisi','paket_ekspedisi','waktu_tempuh','potongan_diskon','tanggal_batas_bayar','status_pengiriman','resi_pengiriman'),$inputan,"-");

		}

		else

		{

			$simpan=elements(array('id_pelanggan','kode_pembelian','tanggal_pembelian','status_pembelian','total_pembelian','biaya_pengiriman','total_bayar','alamat_pengiriman','alamat_pelanggan','ekspedisi','paket_ekspedisi','waktu_tempuh','tanggal_batas_bayar','status_pengiriman','resi_pengiriman'),$inputan,"-");

		}

	

		$this->db->insert("pembelian",$simpan);

	//ambil id_pembelian terakhir

	$idpt=$this->db->insert_id();



	//simpan pembelian_detail (dr_keranjang) diperulangkan sebantak produk yg dibeli



	foreach ($keranjang as $key => $value)

	 {

		$isi['id_pembelian']=$idpt;

		$isi['id_produk']=$value['id_produk'];

		$isi['nama_beli']=$value['nama_produk'];

		$isi['harga_beli']=$value['harga_produk'];

		$isi['berat_beli']=$value['berat_produk'];

		$isi['jumlah_beli']=$value['jumlah'];



		$disimpan=elements(array('id_pembelian','id_produk','nama_beli','harga_beli','berat_beli','jumlah_beli'),$isi,"-");

		$this->db->insert("pembelian_detail",$disimpan);

	}

	//mengembalikan nilai id_pemeblian terakhir ke controller untuk jd nmr nota

	return $idpt;

}

function cek_pembelian()

{

	//tgl hari ini

	$hariini=date('Y-m-d');

	$this->db->where("status_pembelian","belum lunas");

	$ambil=$this->db->get("pembelian");

	$semuapembelian=$ambil->result_array();

	foreach ($semuapembelian as $key => $value)

	 {

		//tgl batas bayar

		$tbb=$value['tanggal_batas_bayar'];

		if (strtotime($hariini) > strtotime($tbb))

		{

			$data['status_pembelian']="batal";

			$this->db->where("id_pembelian",$value['id_pembelian']);

			$this->db->update("pembelian",$data);

		}

	}

}

function laporan_pembelian($inputan)

{

	$this->db->select("*");

	$this->db->join("pelanggan","pelanggan.id_pelanggan=pembelian.id_pelanggan");

	$this->db->where("pembelian.tanggal_pembelian >=",$inputan['tanggal_m']);

	$this->db->where("pembelian.tanggal_pembelian <=",$inputan['tanggal_s']);

	$this->db->where("pembelian.status_pembelian =",$inputan['status_pembelian']);

	$ambil=$this->db->get("pembelian");

	return $ambil->result_array();

}



}



 ?>