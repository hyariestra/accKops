
<!-- data pelanggan ada di var $pelanggan -->

<div class="row">

	<div class="col-md-12">

			<div class="box">

				<div class="box-header">

					<h3 class="box-title"><?php echo $judul ?></h3>

					<hr/>

				</div>

				<div class="box-body">
					
						<div class="row" id="tempelPesan">

							<form id="formInformasi" name="formInformasi" method="post">

							<div class="col-md-6">

								<div class="form-group">
								    <label for="NamaPerusahaan">Nama Perusahaan</label>
								    <input type="text" class="form-control" id="NamaPerusahaan" name="NamaPerusahaan" aria-describedby="NamaPerusahaan" placeholder="Masukan Nama Perusahaan" value="<?php echo $informasi->first_row()->nama_perusahaan?>">
							  	</div>

							  	<div class="form-group">
								    <label for="LogoPerusahaan">Logo Perusahaan</label>
								    <input type="file" id="LogoPerusahaan" name="LogoPerusahaan" aria-describedby="LogoPerusahaan">
								    <small id="emailHelp" class="form-text text-muted">* Logo Perusahaan yang akan ditampilkan pada laporan keuangan</small>
							  	</div>

							  	<hr/>

							    <div class="form-group">
								    <label for="AlamatPerusahaan">Alamat</label>
								    <textarea class="form-control" id="AlamatPerusahaan" name="AlamatPerusahaan" placeholder="Masukan Alamat Perusahaan"><?php echo $informasi->first_row()->alamat?></textarea>
							    </div>

							    <div class="form-group">
								    <label for="KodePos">Kode Pos</label>
								    <input type="text" class="form-control" id="KodePos" name="KodePos" aria-describedby="KodePos" placeholder="Masukan Kode Pos Perusahaan" value="<?php echo $informasi->first_row()->kode_pos?>">
							    </div>
			
							</div>

							<div class="col-md-6">

							    <div class="form-group">
								    <label for="WebPerusahaan">Website</label>
								    <input type="text" class="form-control" id="WebPerusahaan" name="WebPerusahaan" aria-describedby="WebPerusahaan" placeholder="Masukan Nama Website Perusahaan" value="<?php echo $informasi->first_row()->website?>">
							    </div>

							    <div class="form-group">
								    <label for="AlamatPerusahaan">Email</label>
								    <input type="email" class="form-control" id="EmailPerusahaan" name="EmailPerusahaan" aria-describedby="EmailPerusahaan" placeholder="Masukan Email Perusahaan" value="<?php echo $informasi->first_row()->email?>">
							    </div>

							    <hr/>

							    <div class="form-group">
								    <label for="NoTelp">Nomor Telpon</label>
								    <input type="text" class="form-control" id="NoTelp" name="NoTelp" aria-describedby="NoTelp" placeholder="Masukan Nomor Telpon Perusahaan" value="<?php echo $informasi->first_row()->nomor_telp?>">
							    </div>

							    <div class="form-group">
								    <label for="AlamatPerusahaan">Fax</label>
								    <input type="text" class="form-control" id="NoFax" name="NoFax" aria-describedby="NoFax" placeholder="Masukan Nomor Fax Perusahaan" value="<?php echo $informasi->first_row()->fax?>">
							    </div>

							</div>

							</form>
							
						</div>

				</div>

				<div class="box-footer">

					<button class="btn btn-primary pull-right" type="button" id="btnSimpan">Simpan</button>

				</div>

			</div>

	</div>

	<script type="text/javascript">
		
		$('document').ready(function()
    	{
	
			$("#btnSimpan").click(function(e){
        
	            e.preventDefault();

	            var target = "<?php echo site_url("pengaturan/tambahInformasi")?>";

	            var formSerialize   = $("#formInformasi").serialize();
	            
	            var data = {

	                data   : formSerialize,
	            }

	            $.post(target, data, function(e){

	            	//console.log(e);
				
					var json = $.parseJSON(e);

					var hasil = json.hasil;

					if (hasil == 'berhasil') {

						var pesan = '<div class="col-md-12"><div class="alert alert-success">'+json.pesan+'</div></div>';

						$('#tempelPesan').prepend(pesan);

					}else{

						var pesan = '<div class="col-md-12"><div class="alert alert-warning">'+json.pesan+'</div></div>';

						$('#tempelPesan').prepend(pesan);

					}

				});
            
        	});

    	}); 

	</script>

</div>