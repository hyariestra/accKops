<?php panggil_file("header.php"); ?>





<div class="container">

	<h2>Riwayat Belanja</h2>

	<table class="table">

		<thead>

			<tr>

				<th>No</th>

				<th>Tanggal Pembelian</th>

				<th>Total Pembelian</th>

				<th>Alamat Pengiriman</th>

				<th>Status</th>

				<th>Aksi</th>

			</tr>

		</thead>

		<tbody>

			

		<?php foreach ($riwayat as $key => $value): 

			 $tanggal1=$value['tanggal_pembelian'];

		?>



		

			<tr>

				<td><?php echo $key+=1; ?></td>

				<td><?php echo tgl_indo($tanggal1);?></td>

				<td>Rp.<?php echo number_format($value['total_bayar']); ?></td>

				<td><?php echo $value['alamat_pengiriman'].' '.$value['ken'] ?></td>

				<td><?php echo $value['status_pembelian']; ?></td>

				<td width="34%">

				<?php if ($value['status_pembelian']!="batal"): ?>

					

					<a href="<?php echo base_url("Pembelian/pembayaran/$value[id_pembelian]"); ?>" class="btn btn-success">Bukti Pembayaran</a>

				<?php endif ?>

					<a href="<?php echo base_url("Pembelian/nota/$value[id_pembelian]"); ?>" class="btn btn-info">Detail</a>

					<a onclick="pengiriman(this,'<?php echo $value[id_pembelian]; ?>')" href="#" class="btn btn-warning">Status Pengiriman</a>

				</td>

			</tr>

		<?php endforeach ?>

		</tbody>

	</table>

	

</div>


<div class="modal fade" id="pengirimanModal"> 
	<div class="modal-dialog">
		<div class="modal-content">  
			<div class="modal-header">     
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
				<h4 class="modal-title">Detail Status Pengiriman</h4>  
			</div>     
			<table class="table table-striped table-hover">



				<tr>

					<td>Ekspedisi Dan Paket Ekspedisi</td>

					<td><input readonly="" type="text" id="eks" class="form-control"></td>

				</tr>

				<tr>

					<td>Estimasi Waktu Tempuh</td>

					<td><input readonly="" type="text" id="esti" class="form-control"></td>

				</tr>

				<tr>

					<td>Status Pengiriman</td>

					<td><input readonly="" type="text" id="status" class="form-control"></td>

				</tr>

				<tr>			

					<td>Nomor Resi</td>

					<td><input readonly="" type="text" id="resinumb" class="form-control"></td>

				</tr>

				<tr>

				</tr>
			</table>   
			<div class="modal-footer">      
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
				 
			</div>  
		</div><!-- /.modal-content -->  
	</div><!-- /.modal-dialog -->
</div>


<?php panggil_file("footer.php"); ?>

<script type="text/javascript">


	function pengiriman(obj,IDP)
	{

	var target		= "<?php echo site_url("pelanggan/riwayat2")?>";
	data		= {
		idx : IDP
	}

	$.post(target, data, function(e){

		var json = $.parseJSON(e);
	    	// console.log(json); return false;

	    	$('#eks').val(json.rw.ekspedisi+' '+json.rw.paket_ekspedisi);	   
	    	$('#esti').val(json.rw.waktu_tempuh);	   
	    	$('#status').val(json.rw.status_pengiriman);	   
	    	$('#resinumb').val(json.rw.resi_pengiriman);	   
	
	    	$('#pengirimanModal').modal('show');
	    });
}
</script>