<?php 
/**
* 
*/
class M_slider extends CI_model
{
	
	function tampil_slider()
	{
		$ambil=$this->db->get("slider");
		$pecahdata = $ambil->result_array();


		return $pecahdata;
	}
	function simpan_slider($inputan)
	{
		$config['upload_path']  = './assets/foto_slider/';

		//pengaturan tipe file yg boleh diupload 
		$config['allowed_types'] = 'gif|jpg|png';

		//mengenalkan pengaturan upload kita ke library upload nya CI
		$this->upload->initialize($config);

		$this->upload->do_upload('gambar_slider');
		$gambarterupload=$this->upload->data();
		$inputan['gambar_slider']=$gambarterupload['file_name'];


		//menyiapkan array yg mau disimpan ke table slider
		$datakat=elements(array('isi','judul_slider','gambar_slider'),
			$inputan,"-");

		//menyimpan ke tabel slider 
		$this->db->insert('slider',$datakat);
	}
	function hapus_slider($id)
	{
		$datayangmaudihapus = $this->ambil_slider($id);

		//mendapat namafile dari gambar_slider yang mau di hapus
		$gambaryangmaudihapus = $datayangmaudihapus['gambar_slider'];

		//menghapus gambar_slider dari folder assets/foto_slider/namafile.jpg
		unlink("./assets/foto_slider/$gambaryangmaudihapus");


		//menghapus data slider dari tabel
		$this->db->where('id_slider',$id);
		$this->db->delete('slider');
	}
	function ambil_slider($id)
	{
		// mengambil data 1 slider yg id_slider nya ada di url
		//select*from slider where id_slider='$id'
		$hasil=$this->db->get_where('slider',array('id_slider'=>$id));
		//mecah ke array 1 data slider
		$pecah = $hasil->row_array();
		//mengembalikan nilai karena mau menampilkan di tempat lain
		return $pecah;
	}

	function ubah_slider($inputan,$id)
	{
		$config['upload_path']  = './assets/foto_slider/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->upload->initialize($config);
		$mengupload=$this->upload->do_upload('gambar_slider');

		if ($mengupload)
		{
			$gambarterupload=$this->upload->data();
			$inputan['gambar_slider']=$gambarterupload['file_name'];
			$dataprod=elements(array('judul_slider','isi','gambar_slider'),
			$inputan,"-");
		}
			else
		{
			$dataprod=elements(array('judul_slider','isi'),
				$inputan,"-");
		}
		$this->db->where('id_slider',$id);
		$this->db->update('slider',$dataprod);

	}

}

?>