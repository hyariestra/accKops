<?php 



/**

* 

*/

class M_pengaturan extends CI_model

{

	

	function tampilInformasi()

	{

		$queryInfo = $this->db->query("SELECT * FROM mst_informasi");

		return $queryInfo;

	}


	function tambahInformasi($NamaPerusahaan, $AlamatPerusahaan, $KodePos, $WebPerusahaan, $EmailPerusahaan, $NoTelp, $NoFax)

	{

		$this->db->trans_begin();

		$queryInfo = $this->db->query("SELECT * FROM mst_informasi");

		if ($queryInfo->num_rows() > 0) {

			$this->db->query("UPDATE mst_informasi SET nama_perusahaan = '".$NamaPerusahaan."', alamat = '".$AlamatPerusahaan."', kode_pos = '".$KodePos."', website = '".$WebPerusahaan."', email = '".$EmailPerusahaan."', nomor_telp = '".$NoTelp."', fax = '".$NoFax."'");
		
		}else{
		
		$this->db->query("INSERT INTO mst_informasi (nama_perusahaan, alamat, kode_pos, website, email, nomor_telp, fax)
						  VALUES ('".$NamaPerusahaan."', '".$AlamatPerusahaan."', '".$KodePos."', '".$WebPerusahaan."', '".$EmailPerusahaan."', '".$NoTelp."', '".$NoFax."')");
		
		}

		if ($this->db->trans_status() === FALSE)
          {  
            $this->db->trans_rollback();     

            $strMessage['pesan']  = 'Gagal dalam menyimpan data';

            $strMessage['hasil']  = 'gagal';

          }  
          else
          {
             
            $this->db->trans_commit();
                  
            $strMessage['pesan']  = 'Data berhasil disimpan';

            $strMessage['hasil']  = 'berhasil';
          
          }

          echo json_encode($strMessage);

	}

	

	function simpan_pengaturan($datainputan)

	{

		$datapeng=elements(array('kolom','isi'),$datainputan,"-");



		$this->db->insert('pengaturan',$datapeng);

	}

	function hapus_pengaturan($id)

	{

		$this->db->where('id_pengaturan',$id);

		$this->db->delete('pengaturan');

	}

	function ambil_pengaturan($id)

	{

		$hasil=$this->db->get_where('pengaturan',array('id_pengaturan'=>$id));

		$pecah=$hasil->row_array();

		return $pecah;

	}

	function ubah_pengaturan($inputan,$id)

	{

		$datapeng=elements(array('kolom','isi'),

			$inputan,"-");



		$this->db->where('id_pengaturan',$id);

		$this->db->update('pengaturan',$datapeng);

	}





}



 ?>