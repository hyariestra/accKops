<?php panggil_file("header.php") ?>

<?php if (!$pembayaran):

 ?>

	<div class="container">

		<div class="row">

			<div class="col-md-8">

				<h2>Konfirmasi Pembayaran</h2>
				   <?php echo $this->session->userdata("pesan"); ?>
				<form method="post" enctype="multipart/form-data">

					<div class="form-group">

						<label>Kode Pembelian</label>

						<input type="text" class="form-control" value="<?php echo $detail['id_pembelian']; ?>" name="kode_pembelian" readonly>

					</div>

					<div class="form-group">

						<label>Total Pembelian</label>

						<input type="text" class="form-control" value="<?php echo $detail['total_bayar']; ?>" readonly>

					</div>

					<div class="form-group">

						<label>Tanggal Bayar</label>

						<input type="date" class="form-control" name="tanggal_pembayaran" value="<?php echo date("Y-m-d") ?>" >

					</div>

					<div class="form-group">

						<label>Nama</label>
 
						<input required type="text" class="form-control" name="nama_pembayaran">

					</div>

					<div class="form-group">

						<label>Bank</label>

						<input required type="text" class="form-control" name="bank_pembayaran">

					</div>

					<div class="form-group">

						<label>Jumlah</label>

						<input required type="number" class="form-control" name="jumlah_pembayaran">

					</div>

					<div class="form-group">

						<label>Bukti</label>

						<input type="file" class="form-control" name="bukti_pembayaran">

						<em>File yang di upload harus bertipe 'GIF|JPG|PNG|PDF'</em>

					</div>

					<button class="btn btn-primary" type="submit" name="beli" value="beli">Kirim</button>

				</form>

				<br>

				<br>

			</div>

			<div class="col-md-4"></div>

		</div>

	</div>



<?php else:

$tanggal1=$pembayaran['tanggal_pembayaran'];



?>

	<div class="container">

		<h2>Anda Sudah Mengisi Bukti Pembayaran</h2>

		<table class="table table-striped table-hover">

			<tr>

				<td>Nama Pembayaran</td>

				<td>:<?php echo $pembayaran['nama_pembayaran']; ?></td>

			</tr>

			

			<tr>

				<td>Bank Pembayaran</td>

				<td>:<?php echo $pembayaran['bank_pembayaran']; ?></td>

			</tr>

			<tr>

				<td>Jumlah Pembayaran</td>

				<td>:Rp.<?php echo number_format($pembayaran['jumlah_pembayaran']); ?></td>

			</tr>

			<tr>

			

				<td>Tanggal Pembayaran</td>

				<td>:<?php echo tgl_indo($tanggal1);?></td>

			</tr>

			<tr>

			</tr>

		</table>

		<img src="<?php echo base_url("assets/foto_pembayaran/$pembayaran[bukti_pembayaran]") ?>" class="img-responsive" width="300px" height="00px"/>	



	</div>



<?php endif ?>



<?php panggil_file("footer.php") ?>