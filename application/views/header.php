<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo tampil_pengaturan("judul_seo") ?>">
    <meta name="author" content="<?php echo tampil_pengaturan("nama_web") ?>">

    <title><?php echo tampil_pengaturan("nama_web"); ?></title>
     <link href="<?php echo base_url("simibo/css/bootstrap.min.css"); ?>"rel="stylesheet">
<link href="<?php echo base_url("simibo/css/bootstrap.css");?>" rel="stylesheet" type="text/css" media="all" />
    <!--theme-style-->
    <link href="<?php echo base_url("simibo/css/style.css");?>" rel="stylesheet" type="text/css" media="all" /> 
<link href="<?php echo base_url("simibo/css/bootstrap.css");?>" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="<?php echo base_url("simibo/css/style.css");?>" rel="stylesheet" type="text/css" media="all" /> 
<link rel="stylesheet" href="<?php echo base_url("simibo/css/etalage.css");?>" type="text/css" media="all" />

<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="<?php echo base_url("simibo/js/jquery.min.js");?>"></script>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url("simibo/js/jquery.etalage.min.js");?>"></script>
<script src="<?php echo base_url("simibo/ezauc/jquery.easy-autocomplete.min.js");?>"></script>
<link rel="stylesheet" href="<?php echo base_url("simibo/ezauc/easy-autocomplete.min.css");?>"> 

<script>
            jQuery(document).ready(function($){

                $('#etalage').etalage({
                    thumb_image_width: 430,
                    thumb_image_height: 320,
                    source_image_width: 900,
                    source_image_height: 1200,
                    show_hint: true,
                    click_callback: function(image_anchor, instance_id){
                        alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                    }
                });

            });
        </script>

</head>
<body> 
    <header>
        <div class="header">
            <div class="bottom-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="logo">
                                <a href="">
                                    <img class="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <form class="up" role="search" action="<?php echo site_url('Produk/cari');?>" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="Cari Produk...">
                                    <span class="input-group-btn">
                                        <button type="submit" value="cari" class="btn btn-primary">Cari</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                    <div class="btn-group">

                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="glyphicon glyphicon-shopping-cart"></span>
                          Keranjang Belanja <span class="caret">

                      </span>
                  </button> 
                  <ul class="dropdown-menu">
                      <?php foreach (tampil_keranjang() as $key => $value): ?>
                          
                        <li><a href="<?php echo base_url("produk/detail/$value[id_produk]"); ?>"><?php echo $value['nama_produk']; ?></a></li>
                      <?php endforeach ?>
                        <li><a href="<?php echo base_url("Pembelian/checkout"); ?>">Checkout</a></li>
                    </ul>
              

            </div>
        </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>


                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                         <li class="active"><a href="<?php echo base_url("");?>">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="<?php echo base_url("produk"); ?>">Produk</a></li>
                    <li><a href="<?php echo base_url("keranjang/tampil"); ?>">Keranjang Belanja</a></li>

                     <li><a href="<?php echo base_url("halaman/detail/5"); ?>">Tentang Kami</a></li>
                     <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li> --> 
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (!$this->session->userdata("pelanggan")): ?>
                        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span>Login</a></li>
                        <li><a href="<?php echo base_url("Pelanggan/daftar") ?>"><span class="glyphicon glyphicon-log-in"></span>Daftar</a></li>
                    </ul>
                <?php endif ?>
                
                <?php if ($this->session->userdata("pelanggan")): ?>
                   <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akun saya <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url("Pelanggan/riwayat"); ?>">Riwayat Belanja</a></li>
                        <li><a href="<?php echo base_url("Profil/tampil"); ?>">Profil</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo base_url("Pelanggan/logout"); ?>">Log out</a></li>
                    </ul>
                </li>
            <?php endif ?>
            </div><!-- /.navbar-collapse -->
        </nav>
    </header>
