<?php panggil_file("header.php"); ?>





<?php

// mendapatkan tipe kota tujuan

$tipe = $ongkos['kotatujuan']['type'];

$idk = $ongkos['kotatujuan']['city_id'];

// mendapatkan nama kota tujuan

$namakota = $ongkos['kotatujuan']['city_name'];

// mendapatkan provinci kota tujuan

$namaprov = $ongkos['kotatujuan']['province'];

// mendapatkan kodepos kota tujuan

$kodepos = $ongkos['kotatujuan']['postal_code'];



$alamat = $tipe." ".$namakota." ".$namaprov." ".$kodepos;

?>

<section class="judulbar">

	<div class="container">

		<div class="row">

			<div class="col-md-8">

				<h1><?php echo $judul ?></h1>

			</div>

			<div class="col-md-4"></div>

		</div>

	</div>

</section>

<section class="checkout">
	<div class="container">
		<form method="post">

			<div class="row">

				<div class="col-md-4">

					<div class="form-group">

						<label>Kota</label>

						<select class="form-control" name="id_kota" onchange="submit()">

							<option value="">Pilih Kota</option>

							<?php foreach ($kota as $key => $value): ?>

								<option value="<?php echo $value['city_id']; ?>" <?php if($value['city_id']==$kotatujuan){echo "selected";} ?>   >

									<?php echo $value['city_id']; ?> 

									<?php echo $value['type']; ?> 

									<?php echo $value['city_name']; ?>, 

									<?php echo $value['province']; ?> 

									<?php echo $value['postal_code']; ?>

								</option>

							<?php endforeach; ?>

						</select>

					</div>

				</div>

				<div class="col-md-4">

					<div class="form-group">

						<label>Ekspedisi</label>

						<select class="form-control" name="jasaekspedisi" onchange="submit();">

							<option value="">Pilih Jasa ekspedisi</option>

							<option value="tiki" <?php if($jasaekspedisi=="tiki"){echo "selected";} ?> >TIKI</option>

							<option value="pos" <?php if($jasaekspedisi=="pos"){echo "selected";} ?> >POS Indonesia</option>

							<option value="jne" <?php if($jasaekspedisi=="jne"){echo "selected";} ?> >JNE</option>

						</select>

					</div>

				</div>



				<div class="col-md-4">

					<div class="form-group">

						<label>Paket Ekspedisi</label>

						<select class="form-control" name="paket" onchange="submit()">

							<option value="">Pilih Paket</option>

							<?php foreach ($ongkos['paketongkir'] as $kekey => $value): ?>

							<option value="<?php echo $kekey; ?>" <?php if($paket==$kekey && $paket!=""){echo "selected";} ?> ><?php echo $value['service'] ?>

							</option>

							<?php endforeach ?>

						</select>

					</div>

				</div>

			</div>

			<a onclick="keterangan()" class="btn btn-sm btn-warning  pull pull-right" style="margin-bottom:10px;"><span class="glyphicon glyphicon-list-alt">
			</span> Penjelasan Paket Pengiriman
			</a>







		<?php

	// mengambil service/paket yg dipilih

		$paketterpilih = $ongkos['paketongkir'][$paket]['service'];

	// megnambil biaya ongkir

		$biayaongkir = $ongkos['paketongkir'][$paket]['cost']['0']['value'];

	// mengambil waktu tempuh

		$waktutempuh = $ongkos['paketongkir'][$paket]['cost']['0']['etd'];

		?>



		<h3>Keranjang Belanja</h3>

		<table class="table table-bordered">

			<thead>

				<tr class="tab">

					<th>NO</th>

					<th>Nama Produk</th>

					<th>Harga</th>

					<th>Jumlah</th>

					<th>Subtotal</th>

					

				</tr>

			</thead>

			<tbody>

				<?php $totalbelanja=0; ?>

				<?php foreach ($keranjang as $key => $value): ?>

					<?php $totalbelanja+=$value['subtotal']; ?>

					<tr>

						<td><?php echo $key+=1; ?></td>

						<td><?php echo $value['nama_produk']; ?></td>

						<td>Rp. <?php echo number_format($value['harga_produk']); ?></td>

						<td><?php echo $value['jumlah']; ?></td>

						<td>Rp. <?php echo number_format($value['subtotal']); ?></td>

					</tr>

				<?php endforeach ?>

				<tr>

					<th colspan="4">Total Belanja</th>

					<th>Rp. <?php echo number_format($totalbelanja) ?></th>

				</tr>

				<tr>

					<th colspan="4">Total Ongkos Kirim</th>

					<th>Rp. <?php echo number_format($biayaongkir) ?></th>

				</tr>

				<tr>

					<th colspan="4">Diskon/Potongan</th>

					<th>Rp. <?php echo number_format($diskon); ?></th>

				</tr>

				<tr>

					<th colspan="4">Total Bayar</th>

					<th>Rp. <?php echo number_format(($totalbelanja+$biayaongkir)-$diskon); ?></th>

				</tr>

			</tbody>

		</table>





		<h3>Diskon/Potongan</h3>

		<div class="row">

			

				<div class="col-md-4">

					<div class="form-group">

						<input type="text" class="form-control" name="kode_voucher" placeholder="masukan kode kupon belanja">

					</div>

				</div>

				<div class="col-md-4">

					<button class="btn btn-primary" name="cek" value="cek">Cek Kode</button>

				</div>

				<div class="col-md-4">

					<?php echo $this->session->userdata("pesan"); ?>

				</div>

			

		</div>



		<h3>Alamat Pengiriman</h3>



		<div class="form-group">

			<label>Kode Pembelian Kamu</label>

			<input type="text" name="kode_pembelian" class="form-control" value="<?php echo $kd_pem ?>" readonly>

		</div>



			<div class="form-group">

				<label>Kota</label>

				<input type="text" name="alamat_pengiriman" class="form-control" value="<?php echo $alamat ?>" readonly>

				<input type="hidden" name="biaya_pengiriman" value="<?php echo $biayaongkir; ?>">

				<input type="hidden" name="waktu_tempuh" value="<?php echo $waktutempuh; ?>">

				<input type="hidden" name="total_pembelian" value="<?php echo $totalbelanja; ?>">

				<input type="hidden" name="paket_ekspedisi" value="<?php echo $paketterpilih; ?>">

				<input type="hidden" name="ekspedisi" value="<?php echo $jasaekspedisi; ?>">

				<input type="hidden" name="potongan_diskon" value="<?php echo $diskon; ?>">

				<input type="hidden" name="total_bayar" value="<?php echo ($biayaongkir+$totalbelanja)-$diskon; ?>">

			</div>

			<div class="form-group">

				<label>Alamat Lengkap</label>

				<textarea required class="form-control" name="alamat_pelanggan"></textarea>

			</div>

			<button class="btn btn-primary" name="selesai" type="submit" value="selesai">Selesai Belanja</button>

		</form>

<br>

<br>

	</div>

</section>





<?php panggil_file("footer.php"); ?>



<div class="modal fade" id="keteranganModal"> 
	<div class="modal-dialog">
		<div class="modal-content">  
			<div class="modal-header">     
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
				<h4 class="modal-title">Penjelasan Paket Pengiriman</h4>  
			</div>     
			<div class="modal-body">     
				<div class="form-horizontal">   
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#home">JNE</a></li>
						<li><a data-toggle="tab" href="#menu1">TIKI</a></li>
						<li><a data-toggle="tab" href="#menu2">POS Indonesia</a></li>
					</ul>   
					<div class="tab-content">
						<div id="home" class="tab-pane fade in active">
							<h4>CTC (City to City)</h4>
							<p>Paket ini biasanya khusus untuk pengiriman intra kota yang masih berada dalam satu kawasan. Proses pengiriman 1-2 hari kerja.</p>
							<h4>YES (Yakin Esok Sampai)</h4>
							<p>	Kiriman anda akan dikiriman keesokan harinya. (Max 1x24 jam)</p>
							<h4>REG (Reguler)</h4>
							<p>Kiriman anda akan dikirimkan maksimal 2-3 hari kerja. (Tergantung dari wilayah/daerah alamat pengiriman)</p>
							<h4>OKE (Ekonomi)</h4>
							<p>Kiriman anda akan dikirim maksimal 4-7 hari kerja. (Tergantung dari wilayah/daerah alamat pengiriman)</p>
						</div>
						<div id="menu1" class="tab-pane fade">
							<h4>SDS (Same Day Services)</h4>
							<p>Produk SDS sangat cocok untuk anda yang membutuhkan kecepatan dalam pengiriman ke kota-kota besar diseluruh Indonesia. Karena hari ini anda kirimkan maka akan tiba pada hari yang sama</p>
							<h4>ONS (Over Night Services)</h4>
							<p>Produk ONS adalah kiriman yang hanya membutuhkan waktu 1 (satu) hari saja untuk pengantaran ketempat tujuan, sehingga anda tidak perlu menunggu dengan waktu yang lama *</p>
							<h4>TDS (Two Days Services)</h4>
							<p>Hanya membutuhkan 2 (dua) hari saja agar kiriman anda bisa sampai di tempat tujuan *</p>
							<h4>HDS (Holiday Delivery Services)</h4>
							<p>Nikmati kemudahan dalam pengiriman walau di saat hari libur, kami akan tetap mengantarkan kiriman anda sampai ditujuan **</p>
							<h4>REG (Regular)</h4>
							<p>Produk regular menjangkau seluruh wilayah Indonesia hanya dalam waktu kurang dari 7 (tujuh) hari kerja, maka kiriman anda akan segera tiba</p>

						</div>
						
						<div id="menu2" class="tab-pane fade">
							<h3>Paket Kilat Khusus</h3>
							<p>Berat maksimal kiriman s.d 50 kg. Standar Waktu Penyerahan (SWP) H+2 sampai dengan H+9 hari.</p>
							<h3>Paket Next Day Barang</h3>
							<p>Pos Express merupakan layanan premium milik Pos Indonesia untuk pengiriman cepat dan aman dengan jangkauan luas ke seluruh wilayah Indonesia. Standar Waktu Penyerahan (SWP) H+1 hari</p>
							<h3>Paket POS Dangerous Goods </h3>
							<p>Pengiriman benda atau zat yang beresiko membahayakan kesehatan, keselamatan asset atau lingkungan dan tertera dalam daftar International Air Transport Association Dangerous Goods Regulation (IATA DGR). Standar Waktu Penyerahan SWP dihitung sejak diposkan oleh pengirim dengan antaran pertama kali kepada penerima, dikurangi hari libur nasional
							Standar Waktu Penyerahan SWP berdasarkan pola distribusi ke kantor tujuan sesuai dengan layanan Pos Ekspress dan Pos Kilat khsusus.</p>
						</div>
					</div>
				</div>   
			</div>   
			<div class="modal-footer">      
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
				 
			</div>  
		</div><!-- /.modal-content -->  
	</div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
	function keterangan()
	{
		$('#keteranganModal').modal("show");
	}
</script>