<?php panggil_file("header.php"); ?>

<div class="container">
	<div class="row">
		
                <?php foreach ($pencarian as $key => $value): ?>
                
                    <div class="col-md-4">
                        <figure class="thumbnail">
                            <a href="<?php echo base_url("produk/detail/$value[id_produk]"); ?>">
                                <img src="<?php echo base_url("assets/foto_produk/$value[gambar_produk]"); ?>" alt="">
                                <figcaption class="caption">
                                    <h2 class="prod"><?php echo $value['nama_produk']; ?></h2>
                                    <p class="harga">Rp. <?php echo $value['harga_produk']; ?></p>
                                </figcaption>
                            </a>
                        </figure>
                    </div>
            <?php endforeach ?>
                
	</div>
</div>

<?php panggil_file("footer.php"); ?>