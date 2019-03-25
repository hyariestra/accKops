<?php panggil_file('header.php') ?>

<div class="container">
<?php echo $this->session->userdata("pesan"); ?>
	<h2><?php echo $judul ?></h2>
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
				<a href="<?php echo base_url("keranjang/hapus/$value[id_produk]"); ?>" class="btn btn-danger">hapus</a>
			</td>
		</tr>
	<?php endforeach ?>
	<tr>
		<th colspan="4">Total Belanja</th>
		<th>Rp. <?php echo number_format($totalbelanja);  ?></th>
	</tr>
	</tbody>		
	</table>
		
<a href="<?php echo base_url(""); ?>" class="btn btn-primary">Lanjutkan Belanja</a>
<a href="<?php echo base_url("pembelian/checkout"); ?>" class="btn btn-success">Checkout</a>

</div>
<hr>
<?php panggil_file("footer.php") ?>