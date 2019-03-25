<?php panggil_file("header.php"); ?>
<div class="container">
    <?php echo $this->session->userdata("pesan"); ?>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2><?php echo $detail['judul']; ?></h2>
      <?php echo $detail['isi']; ?>
    </div>
  </div>
</div>


<?php panggil_file("footer.php"); ?>
