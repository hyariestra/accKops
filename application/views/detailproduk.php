<?php include('header.php') ?>

<div class="container"> 

  <div class=" single_top">
    <div class="single_grid">
      <div class="grid images_3_of_2">
        <ul id="etalage">
          <li>
            <a href="optionallink.html">
              <img class="etalage_thumb_image" src="<?php echo base_url("assets/foto_produk/$detail[gambar_produk]") ?>" class="img-responsive" />
              <img class="etalage_source_image" src="<?php echo base_url("assets/foto_produk/$detail[gambar_produk]") ?>" class="img-responsive" title="" />
            </a>
          </li>



        </ul>
        <div class="clearfix"> </div>       
      </div> 
      <div class="desc1 span_3_of_2">


        <h4><?php echo $detail['nama_produk'] ?></h4>
        <hr>
        <h6>KODE PRODUK : <az><?php echo $detail['kode_produk']; ?></az></h6>
        <h6>BERAT PRODUK : <az><?php echo $detail['berat_produk']; ?></az> GRAM</h6>
        <h6>HARGA : <az>RP <?php echo number_format($detail['harga_produk']); ?></az></h6>
        <h6>STOK : <az><?php echo $detail['stok_produk']; ?> TERSEDIA</az></h6>
        <form method="post">
          <div class="input-group">  
            <input type="number" class="form-control" name="jumlah" min="1" value="1">
            <div class="input-group-btn">
              <button class="btn btn-primary" type="submit" name="beli" value="beli">Beli</button>
            </div>
          </div>
        </form>

        <p><?php echo $detail['keterangan_produk']; ?></p>
        <?php echo $this->session->userdata("pesan"); ?>
      </div>
      <div class="clearfix"> </div>
    </div>



    <div class="toogle">
      <h3 class="m_3">Komentar</h3>
      <?php if (!$komentar): ?>
        <strong>Belum ada komentar terhadap produk ini</strong>
        <br>
        <br>
        <br>

      <?php else: ?>
        <?php foreach ($komentar as $key => $value): ?>
          
          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object" src="<?php echo base_url('simibo/images/avatar.png'); ?>" alt="Generic placeholder image">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading"><?php echo $value['nama_pelanggan']; ?></h4>
              <?php echo $value['isi_komentar']; ?>
              <br>
              <br>
              <br>
              <div class="media">
               <?php if (!$value['balas_komentar']): ?>
                <?php echo ""; ?>
              <?php else: ?>
                <a class="media-left" href="#">
                  <img class="media-object" src="<?php echo base_url('simibo/images/avatar.png'); ?>" alt="Generic placeholder image">
                </a>

                
                <div class="media-body">
                  <h4 class="media-heading">ADMIN</h4>
                  <?php echo $value['balas_komentar']; ?>
                </div>
              <?php endif ?>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php endif ?>

    <?php if (!$this->session->userdata("pelanggan")): ?>
      <strong>anda harus login untuk berkomentar</strong>
      <a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span>Login</a>
    <?php else: ?>
      <br>
      <br>
      <br>
      <br>
      <form method="post">
        <div class="form-group">
          <input class="form-control" value="<?php $pel = $this->session->userdata("pelanggan"); echo $pel['nama_pelanggan']; ?>" readonly>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="isi_komentar"></textarea>
        </div>
        <button class="btn btn-primary" name="kirim" value="kirim">Kirim</button>
      </form>
    <?php endif ?>
  </div>  
</div>


<?php include('sidebar.php') ?>     
</div>
<?php include('footer.php') ?>