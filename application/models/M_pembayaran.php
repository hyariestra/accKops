<?php 



/**

* 

*/

class M_pembayaran extends CI_model

{

	

	function ambil_pembayaran($id)

	{

		$this->db->where("id_pembelian",$id);

		$query=$this->db->get("pembayaran");

		return $query->row_array();

	}

	function simpan_pembayaran($inputan,$id)

	{

		$config['upload_path']  = './assets/foto_pembayaran/';

		$config['allowed_types'] = 'gif|jpg|png|pdf';

		$this->upload->initialize($config);

		$this->upload->do_upload('bukti_pembayaran');

		$terupload=$this->upload->data();



		$inputan['bukti_pembayaran']=$terupload['file_name'];

		$inputan['id_pembelian']=$id;



		$simpan=elements(array('kode_pembelian','bukti_pembayaran','tanggal_pembayaran','nama_pembayaran','bank_pembayaran','jumlah_pembayaran','id_pembelian'),$inputan,"-");

		$this->db->insert("pembayaran",$simpan);

		//ubah status pembelian jadi sudah konfirmasi 

		$data=array('status_pembelian'=>"Sudah konfirmasi");

		$this->db->where('id_pembelian',$id);

		$this->db->update('pembelian',$data);



	}

}



 ?>