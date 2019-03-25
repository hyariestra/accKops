<?php 

/**
* 
*/
class M_produk extends CI_model
{
	
	function tampil_produk($posisi=0,$batas=99999999)
	{
		//join tabel produk dgn tabel kategori
		//select * from 'produk' p JOIN kategori k ON p.id_kategori = k.id_kategori

		$this->db->select('*');
		$this->db->order_by('id_produk', 'DESC');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
		$this->db->limit($batas,$posisi);
		$query = $this->db->get();
		//data dipecah ke array dan diperulangan
		$pecah = $query->result_array();
		//memngembalikan nilai karena data mu dipakai di tempat lain
		return $pecah;
	}
	function tampil_produk_terbaru($batas)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori','kategori.id_kategori = produk.id_kategori');
		$this->db->limit($batas);
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		$pecah = $query->result_array();
		return $pecah;
	}

	function tampil_produk_kategori($id,$special = false)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
		$this->db->where('produk.id_kategori',$id);
		$query=$this->db->get();
		
		 if($special)
		    {
		        return $query;
		    }
		    
		
		return $query->result_array();

	}

	function simpan_produk($datainputan)
	{

		$config['upload_path']  = './assets/foto_produk/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->upload->initialize($config);
		$this->upload->do_upload('gambar_produk');
		$gambarterupload=$this->upload->data();
		$datainputan['gambar_produk']=$gambarterupload['file_name'];
		$datainputan['tanggal_produk'] = date("Y-m-d H:i:s");
		$dataprod=elements(array('id_kategori','kode_produk','nama_produk','stok_produk','harga_produk','berat_produk','tanggal_produk','keterangan_produk','gambar_produk'),
			$datainputan,"-");
		$this->db->insert('produk',$dataprod);
	}
	function hapus_produk($id)
	{
		$datahapus=$this->ambil_produk($id);
		$gambarhapus = $datahapus['gambar_produk'];

		unlink("./assets/foto_produk/$gambarhapus");
		$this->db->where('id_produk',$id);
		$this->db->delete('produk');
	}
	function ambil_produk($id)
	{
		$this->db->where('id_produk',$id);
		$query= $this->db->get("produk");
		$pecah = $query->row_array();
		return $pecah;
	}
	function ubah_produk($inputan,$id)
	{
		$config['upload_path']  = './assets/foto_produk/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->upload->initialize($config);
		$mengupload=$this->upload->do_upload('gambar_produk');

		if ($mengupload)
		{
			$gambarterupload=$this->upload->data();
			$inputan['gambar_produk']=$gambarterupload['file_name'];
			$dataprod=elements(array('id_kategori','kode_produk','nama_produk','stok_produk','harga_produk','berat_produk','keterangan_produk','gambar_produk'),
			$inputan,"-");
		}
			else
		{
			$dataprod=elements(array('id_kategori','kode_produk','nama_produk','stok_produk','harga_produk','berat_produk','keterangan_produk'),
				$inputan,"-");
		}
		$this->db->where('id_produk',$id);
		$this->db->update('produk',$dataprod);

	}
	function cari_produk($inputan)
	{
		$this->db->select('*');
		$this->db->join('kategori','produk.id_kategori=kategori.id_kategori');
		$this->db->where("produk.nama_produk LIKE '%$inputan%' OR produk.keterangan_produk LIKE '%$inputan%' OR kategori.nama_kategori LIKE '%$inputan%'");
		$query=$this->db->get("produk");
		$pecah=$query->result_array();
		return $pecah;
	}
	function kurangi_stok($id_produk,$jumlah_beli)
	{
		//mendapatkan stok produk itu
		$this->db->where("id_produk",$id_produk);
		$ambil=$this->db->get("produk");
		$pecah=$ambil->row_array();
		$setok=$pecah['stok_produk'];

		//mengurangi stok dgn jumlah yang dibeli

		if (($setok-$jumlah_beli) <= 0 )
		 {
			$data['stok_produk']="0";
		}
		else
		{
			$data['stok_produk']=$setok-$jumlah_beli;
		}

		//update dengan stok terbaru
		$this->db->where("id_produk",$id_produk);
		$this->db->update("produk",$data);

	}


}

?>