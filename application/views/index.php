<?php include('header.php') ?>

<style type="text/css">
  .chain-grid img{

  height: 300px !important;

}

</style>

<div class="container">
    <?php echo $this->session->userdata("pesan"); ?>
</div>
<div class="container">
 <div class="shoes-grid">
  <a href="">
   <div class="wrap-in">
    <div class="wmuSlider example1 slide-grid">    
     <div class="wmuSliderWrapper">     
        <?php foreach ($slider as $key => $value): ?>
      <article style="position: absolute; width: 100%; opacity: 0;">          
        <div class="item <?php if ($key==0) { echo("active");} ?> ">
       <div style="height: 700px;" class="banner-matter">
        <div class="col-md-12 banner-bag">
         <img style="width: 900px;height: 600px; z-index:-1; position: absolute;" class="img-responsive " src="<?php echo base_url("assets/foto_slider/$value[gambar_slider]") ?>" alt="" />
     </div>
     <div class="col-md-7 banner-off">              
         <h2><?php echo $value['judul_slider']; ?></h2>
         <label><?php echo $value['isi']; ?></label>
         <!-- <p></p>           -->
        <!--  <span class="on-get">GET NOW</span> -->
     </div>

     <div class="clearfix"> </div>
 </div>

</article>
        <?php endforeach ?>



</div>
</a>
<ul class="wmuSliderPagination">
 <li><a href="#" class="active">0</a></li>
 <li><a href="#" class="">1</a></li>
 <li><a href="#" class="">2</a></li>
</ul>
<script src="<?php echo base_url('simibo/js/jquery.wmuSlider.js') ?>"></script> 
<script>
 $('.example1').wmuSlider();         
</script> 
</div>
</div>
</a>


<div class="products">
  <h5 class="latest-product">LATEST PRODUCTS</h5> 
  <a class="view-all" href="product.html">VIEW ALL<span> </span></a>         
</div>



<div class="product-left">

<?php foreach ($produkterbaru as $key => $value): ?>
  

  <div class="col-md-4 chain-grid">
   <a href="<?php echo base_url("produk/detail/$value[id_produk]"); ?>"><img class="img-responsive chain" src="<?php echo base_url("assets/foto_produk/$value[gambar_produk]") ?>" alt=" " /></a>
   <span class="star"> </span>
   <div class="grid-chain-bottom">
    <h6><a href="<?php echo base_url("produk/detail/$value[id_produk]"); ?>"><?php echo $value['nama_produk']; ?></a></h6>
    <div class="star-price">
     <div class="dolor-grid"> 
      <span class="actual">Rp. <?php echo number_format($value['harga_produk']); ?></span>
     

  </div>

  <div class="clearfix"> </div>
</div>
</div>
</div>

<?php endforeach ?>


</div>


</div>  

<?php include('sidebar.php') ?>
               
</div>

<!---->
<?php include('footer.php') ?>