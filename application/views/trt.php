<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo tampil_pengaturan("judul_seo") ?>">
    <meta name="author" content="<?php echo tampil_pengaturan("nama_web") ?>">

    <title><?php echo tampil_pengaturan("nama_web"); ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("simibo/css/bootstrap.min.css"); ?>"rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url("simibo/css/shop-homepage.css"); ?>" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <!-- <img class="img-circle" src="gambar/simibo.jpg"> -->
                </div>
                <div class="col-md-4">
                    <!-- Single button -->
                    <form method="post" action="<?php echo base_url("produk/cari"); ?>">
                        <div class="input-group">
                            <input type="text" class="form-control" name="kata_kunci" placeholder="cari produk...">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">

                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-shopping-cart brown"></span>
                            Keranjang Belanja <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Produk A</a></li>
                            <li><a href="#">Produk B</a></li>
                            <li><a href="#">Produk C</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Check Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo base_url("") ?>">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="<?php echo base_url("produk"); ?>">Produk</a></li>
                    <li><a href="<?php echo base_url("keranjang/tampil"); ?>">Keranjang Belanja</a></li>
                    <li class="dropdown">
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
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                <?php if (!$this->session->userdata("pelanggan")): ?>
                    
                    <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
                    <li><a href="<?php echo base_url("Pelanggan/daftar") ?>">Daftar</a></li>
                <?php endif ?>

                    <?php if ($this->session->userdata("pelanggan")): ?>
                        
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akun saya <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url("Pelanggan/riwayat"); ?>">Riwayat Belanja</a></li>
                            <li><a href="<?php echo base_url("Pelanggan/profil"); ?>">Profil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url("Pelanggan/logout"); ?>">Log out</a></li>
                        </ul>
                    </li>
                    <?php endif ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!--   <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="assets/foto_produk/1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="assets/foto_produk/2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="assets/foto_produk/3.jpg" alt="">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div> -->



<div class="col-md-4">
                <h3 class="cate">Kategori </h3>
                <div class="list-group">
                <?php foreach ($kategori as $key => $value): ?>
                    
                    <a href="<?php echo base_url("kategori/produk/$value[id_kategori]"); ?>" class="list-group-item"><?php echo $value['nama_kategori']; ?></a>
                   
                <?php endforeach ?>
                </div>
            </div>

            <?php panggil_file("header.php"); ?>

<div class="container">
    <?php echo $this->session->userdata("pesan"); ?>
</div>

<div class="container">
    <div class="row">
       <div class="col-md-8">
        <h3 class="batas">Produk Terbaru </h3>
    </div>
</div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="row">
              <div class="col-xs-12 col-sm-4">
                  <div class="thumbnail text-center">
                   <a href="">
                    <img src="gambar/choco.jpg">
                
                <div class="caption">
                    <h2>Lorem ipsum dolor sit amet</a></h2>
                    <p>Rp. 215.000</p>
                </div>
            </div>
        </div>
        
    



</div>
</div>
</div>
</div>






<?php panggil_file("footer.php"); ?>


<div class="fotop">
    <div class="container">
        <footer>
            <div class="row">
                <div class="col-lg-12">

                   <div class="col-md-3">
                       <div class="footer-bottom-cate">

                        <ul>
                            <li class="text-center"><img class="img-circle" src="gambar/simibo.jpg"></li>
                           <em><p class="text-center">copyright ©  2016</p></em>
                           <em><p class="text-center">Simibo Merchandise</p></em>
                           <em><p class="text-center">All Rights Reserved.</p></em>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                   <div class="footer-bottom-cate">
                    <h6>CATEGORIES</h6>
                    <hr>
                    <ul>
                        <li><a href="#">Curabitur sapien</a></li>
                        <li><a href="#">Curabitur sapien</a></li> 
                        <li><a href="#">Curabitur sapien</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
               <div class="footer-bottom-cate">
                <h6>Customer Services</h6>
                <hr>
                <ul>
                      <li><a href="#">  Privacy Policy</a></li>
                        <li><a href="#">Delivery Information</a></li> 
                        <li><a href="#">Terms and Condition</a></li>
                        <li><a href="#">Payment Methods</a></li>
                        <li><a href="#">Return Policy</a></li>
                </ul>
            </div>
        </div>
         <div class="col-md-3">
               <div class="footer-bottom-cate">
                <h6>kontak</h6>
                <hr>
                <ul>
                    <p><i class="glyphicon glyphicon-envelope"></i>Curabitur sapien</p>
                    <p><i class="glyphicon glyphicon-home"></i>Jl Bhayangkata wates KP, Yogyakarta 55611</p>
                    <p><i class="glyphicon glyphicon-earphone"></i>0897161515</p>
                </ul>
                
            </div>
    </div>
</div>
</footer>

</div>
</div>
<!-- /.container -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>
                <form method="post" action="<?php echo base_url("Pelanggan/login") ?>">
            <div class="modal-body">
                    <div class="form-group">
                        <label>username</label>
                        <input type="text" class="form-control" name="email_pelanggan">
                    </div>
                    <div class="form-group">
                        <label>password</label>
                        <input type="password" class="form-control" name="password_pelanggan">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </div>
                </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?php  echo base_url("simibo/js/jquery.js"); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo  base_url("simibo/js/bootstrap.min.js"); ?>"></script>

</body>

</html>
