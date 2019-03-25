<?php include('header.php') ?>
<div class="container">
  <?php echo $this->session->userdata("pesan"); ?>
</div>
<div class="container">

  <div class="women-product">
    <div class=" w_content">

    </div>
    <!-- grids_of_4 -->

    <div class="grid-product">

     <?php foreach ($produk as $key => $value): 
     $isi = substr($value[keterangan_produk],0,30);
     $content = preg_replace("/<img[^>]+\>/i", " ", $isi); 

     ?>

     <div class="col-md-4 chain-grid">
      <div class="content_box"><a href="<?php echo base_url("produk/detail/$value[id_produk]") ?>">
        <div class="left-grid-view grid-view-left">
         <img src="<?php echo base_url("assets/foto_produk/$value[gambar_produk]") ?>" class="img-responsive watch-right" alt=""/>
         <?php if ($value['stok_produk']==0): ?>
          <!-- <div class="mask">
            <div class="info2">Quick View</div>
          </div> -->
          <?php $info = '<div  style="color: #e74c3c;font-weight: bold;">Stok Produk Kosong</div>'?>
        <?php else: ?>
          <?php $info = '<div style="visibility: hidden;">Stok Produk Ada</div>' ?>

        <?php endif ?>

      </a>
    </div>
    <div class="grid-chain-bottom">
      <h6><a href="<?php echo base_url("produk/detail/$value[id_produk]"); ?>"><?php echo $value['nama_produk']; ?></a></h6>
      <div class="star-price">
       <div class="dolor-grid"> 
        <p><?php echo $content?>...</p>
        <span class="actual">Rp. <?php echo number_format($value['harga_produk']); ?></span>
        <?php echo $info ?>
       
      </div>

      <div class="clearfix"> </div>
    </div>
  </div>
</div>
</div>

<?php endforeach ?>




<div class="clearfix"> </div>
<ul class="pagination">
  <?php 
  for ($i=1; $i<=$page ; $i++) { 
   ?>
   <li><a href="<?php echo base_url("produk/index/$i") ?>"><?php echo $i; ?></a></li>
   <?php } ?>


 </ul>
</nav>
</div>
</div>
<?php include('sidebar.php') ?>
<div class="clearfix"> </div>
</div>
<!---->
<?php include('footer.php') ?>

