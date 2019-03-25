<?php panggil_file("header.php"); ?>

<section class="judulbar">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1>Nota Belanja</h1>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
</section>

<div class="container">
  <section class="invoice">
  
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      Dari
      <address>
        <strong><?php echo tampil_pengaturan("nama_usaha"); ?></strong><br>
        Alamat : <?php echo tampil_pengaturan("alamat_usaha") ?><br>
        Email : <?php echo tampil_pengaturan("email_usaha"); ?><br>
        Telepon : <?php echo tampil_pengaturan("telepon_usaha"); ?>
      </address>
    </div><!-- /.col -->
    <div class="col-sm-4 invoice-col">
      Kepada
      <address>
        <strong><?php echo $pembelian['nama_pelanggan']; ?></strong><br>
        <?php echo $pembelian['alamat_pengiriman'] ?><br>
        <?php echo $pembelian['email_pelanggan'] ?><br>
        <?php echo $pembelian['telepon_pelanggan'] ?>
      </address>
    </div><!-- /.col -->
    <!-- /.col -->
  </div><!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($detail as $key => $value): ?>
            <?php $subtotal = $value['jumlah_beli'] * $value['harga_beli']; ?>
          <tr>
            <td><?php echo $key+=1; ?></td>
            <td><?php echo $value['nama_beli']; ?></td>
            <td><?php echo $value['jumlah_beli']; ?></td>
            <td>Rp. <?php echo number_format($value['harga_beli']); ?></td>
            <td>Rp. <?php echo number_format($subtotal); ?></td>
          </tr>
          <?php endforeach ?>

        </tbody>
      </table>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-6">
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        <b>Bayar Kepada</b><br>
        <?php echo tampil_pengaturan("rek_usaha") ?>
      </p>

      <?php 
      $tanggal1=$pembelian['tanggal_batas_bayar'];

   ?>
  
    <h4><b>Tanggal Batas Pembayaran <?php  echo tgl_indo($tanggal1); ?></b></h4>
     <em><p>kebijakan tentang batas pembayaran baca <a href="halaman/detail/6">disini</a></p></em>
    </div><!-- /.col -->
    <div class="col-xs-6">
      
      <div class="table-responsive">
        <table class="table">
        <tr>
            <th style="width:50%">Kode Pembelian:</th>
            <td><?php echo $pembelian['kode_pembelian'] ?></td>
          </tr>
          <tr>
            <th>Total Belanja:</th>
            <td>Rp. <?php echo number_format($pembelian['total_pembelian']); ?></td>
          </tr>
          <tr>
            <th>Total Ongkos Kirim</th>
            <td>Rp. <?php echo number_format($pembelian['biaya_pengiriman']); ?></td>
          </tr>
          <tr>
            <th>Potongan Diskon</th>
            <td>Rp. <?php echo number_format($pembelian['potongan_diskon']); ?></td>
          </tr>
          <tr>
            <th>Total bayar</th>
            <td>Rp. <?php echo number_format($pembelian['total_bayar']); ?></td>
          </tr>
        
        </table>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      <a onclick="print()" class="btn btn-default "><i class="fa fa-print"></i> Print</a>
      <?php if ($pembelian['status_pembelian']!='batal'): ?>
        
      <a href="<?php echo base_url("pembelian/pembayaran/$pembelian[id_pembelian]") ?>" class="btn btn-success pull-right "><i class="fa fa-credit-card"></i> Kirim Bukti Pembayaran</a>
     <?php else: ?>
      <div class="alert alert-danger">Pembelian telah dinyatakan batal karena melebihi batas waktu </div>
      <?php endif ?>

    </div>
  </div>
</section>
</div>

<br>

<?php panggil_file("footer.php"); ?>