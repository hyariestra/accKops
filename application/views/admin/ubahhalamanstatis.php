<!-- data pelanggan ada di var $pelanggan -->
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><?php echo $judul ?></h3>
					<form method="post">
						<div class="box-body">
							<div class="form-group">
								<label>Kolom</label>
								<input type="text" name="judul" class="form-control" value="<?php echo $halamanstatis['judul']; ?>"></input>
							</div>
						<div class="form-group">
								<label>Isi</label>
								<textarea name="isi" class="form-control" id="editorku"><?php echo $halamanstatis['isi']; ?></textarea>
							</div>

					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				
			</div>
			
		</div>
		
	</div>
	
</div>