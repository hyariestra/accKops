<?php panggil_file("header.php"); ?>

<div class="container">
	<div class="row">
		<div class="col-md-3 col-md-offset-1"> 
			<ul class="nav nav-pills nav-stacked" role="tablist">
				<li role="presentation" class="active"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab">Keranjang Belanja</a></li>
				<li role="presentation">
				<a href="#deskripsi" aria-controls="deskripsi" role="tab" data-toggle="tab">Pengaturan</a></li>
			</ul>
		</div>
		<div class="col-md-7">
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="detail">
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Produk</th>
								<th>Harga</th>
								<th>Jumlah </th>
								<th>Subtotal</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $totalbelanja=0; ?>
							<?php foreach ($keranjang as $key => $value): ?>
								<?php $totalbelanja+=$value['subtotal']; ?>
								<tr>
									<td><?php echo $key+=1; ?></td>
									<td><?php echo $value['nama_produk'];  ?></td>
									<td>Rp.<?php echo number_format($value['harga_produk']);  ?></td>
									<td><?php echo $value['jumlah'];  ?></td>
									<td>Rp.<?php echo number_format($value['subtotal']) ;  ?></td>
									<td>
										<a href="<?php echo base_url("profil/hapus/$value[id_produk]"); ?>" class="btn btn-danger">hapus</a>
									</td>
								</tr>
							<?php endforeach ?>
							<tr>
								<th colspan="4">Total Belanja</th>
								<th>Rp. <?php echo number_format($totalbelanja); ?></th>
							</tr>
						</tbody>		
					</table>
					<a href="<?php echo base_url(""); ?>" class="btn btn-primary">Lanjutkan Belanja</a>
					<a href="<?php echo base_url("Pembelian/checkout"); ?>" class="btn btn-success">Checkout</a>
					<br>
					<?php echo $this->session->userdata("pesan"); ?>

				</div>
				<br>
				<div role="tabpanel" class="tab-pane" id="deskripsi">
					<form method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>email</label>
							<input type="text" name="email_pelanggan" class="form-control" value="<?php echo $pelanggan['email_pelanggan']; ?>" readonly>
							</div>
							<div class="form-group">
							<label>Ubah Password</label>
							<input type="text" name="password_pelanggan" class="form-control" placeholder="masukan password baru" ></div>
							<div class="form-group">
							<label>Ubah Nama</label>
							<input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $pelanggan['nama_pelanggan']; ?>">
							</div>
							<div class="form-group">
							<label>Telepon</label>
							<input type="text" name="telepon_pelanggan" class="form-control" value="<?php echo $pelanggan['telepon_pelanggan']; ?>">
							</div>
						
							<button class="btn btn-success" name="ubah" value="ubah">
								Ubah Profil
							</button>
							<br>
							<br>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php panggil_file("footer.php"); ?>