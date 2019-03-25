<?php
class Pembelian extends CI_controller
{
	function nota($id)
	{
	
		$this->load->model("M_pembelian");
		$data['judul'] ="nota pembelian";
		$data['pembelian'] = $this->M_pembelian->ambil_pembelian($id);		
		$data['detail'] = $this->M_pembelian->detail_pembelian($id);
		$idper = $this->session->userdata("pelanggan");
		$idpel = $idper['id_pelanggan'];
		$idpelpem = $data['pembelian']['id_pelanggan'];
		if($idpel !== $idpelpem)
		{
			redirect("pelanggan/riwayat");
		}

		$this->load->view("nota",$data);
	}
	function pembayaran($id)
	{
		// $id adalah id_pembelian bukan id_pembayaran

		// mengambil data pembelian yang id_pembelian nya adalah itu
		$this->load->model("M_pembelian");
		$data['detail'] = $this->M_pembelian->ambil_pembelian($id);

		// mengambil pembayaran pembelian itu, apakah sudah pernah nginput pembayaran
		$this->load->model("M_pembayaran");
		$data['pembayaran'] = $this->M_pembayaran->ambil_pembayaran($id);
		// if(isset($datapembayaran))
		// {
		// 	$data['pembayaran'] = $datapembayaran;
		// }

		$data['judul'] = "Konfirmasi Pembayaran";
		$this->load->view("konfirmasipembayaran",$data);
		$this->load->model("M_pembayaran");

				$inputan = $this->input->post();
		
		if ($this->input->post("beli")) 
		{
			if ($inputan['jumlah_pembayaran'] !== $data['detail']['total_bayar']) 
			{
				$isipesan="<br><div class='alert alert-danger'>Nominal Anda tidak sesuai dengan Total Pembelian, masukan kembali inputan anda</div>";

				$this->session->set_flashdata("pesan",$isipesan);

				redirect("pembelian/pembayaran/$id");
			}else{

				if($inputan)
				{
					$this->M_pembayaran->simpan_pembayaran($inputan,$id);
					redirect("pelanggan/riwayat");
				}
			}
		}
	}
	function checkout()
	{
		// jika belum login, maka di redirect ke index atau utama
		if(!$this->session->userdata("pelanggan"))
		{
			$isi = "<div class='alert alert-danger'>Silahkan Login Untuk Dapat melakukan checkout</div>";
				$this->session->set_flashdata("pesan",$isi);
			redirect("pelanggan/daftar");
		}
		
		$this->load->model("M_pembelian");
		$data['judul'] = "Check out";
		$data['kd_pem']=$this->M_pembelian->generateAutoid();
		// mendapatkan data kota hasil dari helper api_kota()
		$data['kota'] = api_kota();

		// jika view mengirimkan id_kota, maka disimpan di variabel kotatujuan
		if($this->input->post("id_kota"))
		{
			$data['kotatujuan'] = $this->input->post("id_kota");
		}
		else
		{
			$data['kotatujuan'] = "";//klo view gak ngirim kotatujuan=0
		}

		// jika view mengirimkan jasaekspedisi, mka disimpan di variabel jasaekspedisi
		if($this->input->post("jasaekspedisi"))
		{
			$data['jasaekspedisi'] = $this->input->post("jasaekspedisi");
		}
		else
		{
			$data['jasaekspedisi'] = "";
		}

		// mendapatkan beratbelanja dari model M_keranjang fungsi tampil_keranjang
		$this->load->model("M_keranjang");
		$data['beratbelanja']=0;
		$keranjang = $this->M_keranjang->tampil_keranjang();
		foreach($keranjang as $key => $value)
		{
			// menghitung subberat perproduk (berat perproduk x jmlh yg dibeli)
			$subberat = $value['berat_produk']*$value['jumlah'];
			// megnhitung beratbelanja(total semua subberat)
			$data['beratbelanja']+=$subberat;
		}


		// mendapatkan data ongkos kirim hasil dari helper apil_ongkir
		$data['ongkos'] = api_ongkir("501",$data['kotatujuan'],$data['beratbelanja'],$data['jasaekspedisi']);

		$pak = $this->input->post("paket");
		if (isset($pak) AND $pak!="") 
		{
			$data['paket'] = $this->input->post('paket');
		}
		else
		{
			$data['paket'] = "";
		}

		// ngurusin potongan/diskon
		// jika kode kupon diinput
		if($this->input->post('cek'))
		{
			$data['kotatujuan'] = $this->input->post('id_kota');
			$data['jasaekspedisi'] = $this->input->post('jasaekspedisi');
			$data['paket'] = $this->input->post("paket");
			// cek diskon berdasarkan kode_kupon
			$this->load->model("M_voucher");
			$kode = $this->input->post("kode_voucher");
			$hasil = $this->M_voucher->cek_voucher($kode);
			if($hasil) //jika ada hasil diskon
			{
				$this->session->set_userdata("diskon",$hasil);
				$data['diskon'] = $this->session->userdata("diskon");
				$isi = "<div class='alert alert-info'>selamat, belanja Anda telah didiskon</div>";
				$this->session->set_flashdata("pesan",$isi);
			}
			else //selainitu(gak ada diskon)
			{
				$data['diskon'] = 0;
				$isi = "<div class='alert alert-danger'>tidak ada diskon pembelian</div>";
				$this->session->set_flashdata("pesan",$isi);
			}

		}
		else
		{
			$data['diskon'] = 0;
		}


		// menampilkan keranjang belanja
		$this->load->model("M_keranjang");
		$data['keranjang'] = $this->M_keranjang->tampil_keranjang();

		// menaruh di view
		$this->load->view("checkout",$data);

		// skrip simpan pembelian
		if ($this->input->post("selesai")) 
		{
			$inputan = $this->input->post();
			//menpatkan id_pelanggan
			$idper = $this->session->userdata("pelanggan");
			$idpel = $idper['id_pelanggan'];
			$this->load->model("M_pembelian");
			$idpt = $this->M_pembelian->simpan_pembelian($inputan,$idpel,$data['keranjang'],$this->session->userdata("diskon"));
			//mengosongkan keranjang belanja
			$this->session->unset_userdata("keranjang");
			// mengosongkan diskon
			$this->session->unset_userdata("diskon");

			//dapatkan detail pembelian
			$detailpembelian =$this->M_pembelian->ambil_pembelian($idpt);

			// di redirect ke nota
			redirect("pembelian/nota/$idpt");

		}
		
	}
}
?>