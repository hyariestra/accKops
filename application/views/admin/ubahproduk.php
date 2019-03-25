<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><?php echo $judul ?></h3>
				<form method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>Kategori</label>
							<select class="form-control" name="id_kategori">
								<option value="">Pilih Kategori</option>
								<?php foreach ($kategori as $key => $value): ?>
								<option value="<?php echo $value['id_kategori']; ?>" <?php if($value['id_kategori']==$produk['id_kategori']){echo"selected";} ?>><?php echo $value['nama_kategori']; ?></option>
									
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label>Nama Produk</label>
							<input type="text" name="nama_produk" class="form-control" value="<?php echo $produk['nama_produk']; ?>">
						</div>
						<div class="form-group">
							<label>Kode Produk</label>
							<input type="text" name="kode_produk" class="form-control" value="<?php echo $produk['kode_produk']; ?>">
						</div>
						<div class="form-group">
							<label>Stok</label>
							<input type="text" name="stok_produk" class="form-control" value="<?php echo $produk['stok_produk']; ?>">
						</div>
						<div class="form-group">
							<label>Berat</label>
							<input type="text" name="berat_produk" class="form-control" value="<?php echo $produk['berat_produk']; ?>">
						</div>
						<div class="form-group">
							<label>Harga</label>
							<input type="text" name="harga_produk" class="form-control" value="<?php echo $produk['harga_produk']; ?>"> 
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea name="keterangan_produk" class="form-control" id="editorku"><?php echo $produk['keterangan_produk']; ?></textarea>
						</div>
							<div class="form-group">
								<img src="<?php echo base_url("assets/foto_produk/$produk[gambar_produk]") ?>" width="500">
								
							</div>

						<div class="form-group">
								<label>gambar produk</label>
								<input type="file" name="gambar_produk" class="form-control" ></input>
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