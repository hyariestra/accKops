<div class="footer">
<div class="footer-top">
        <div class="container">
            
            <!-- <div class="latter">
                <b><p>FOLLOW US</p></b>
                <ul class="face-in-to">
                   <?php echo tampil_pengaturan("ig") ?>
                </ul>
                <div class="clearfix"> </div>
            </div> -->
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
               
             

                        <ul>
                            <li class="text-center"><img class="img-circle" src="<?php echo base_url("assets/foto_slider/logo.jpg"); ?>"></li>
                         <em><p class="text-center">copyright ©  2016 tes ke dua</p></em>
                          <em><p class="text-center"> <?php echo tampil_pengaturan("nama_web") ?></p></em>
                           <em><p class="text-center">All Rights Reserved.</p></em>
                        </ul>
                    
            </div>
            <div class="col-md-3">
               <div class="footer-bottom-cate">
                <h6>Customer Services</h6>
                <ul>    
                    <?php foreach (tampil_halamanstatis() as $key => $value): 
                    

                    ?>
                        
                      <li><a href="<?php echo base_url("halaman/detail/$value[id_halaman]"); ?>"><?php echo $value['judul']; ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
            </div>
            <div class="col-md-3">
                <div class="footer-bottom-cate">
                <h6>Our Social</h6>
                 <ul>    
             
                      <li><?php echo tampil_pengaturan("ig") ?></li>
      
                </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-bottom-cate">
                    <h6>Contact Us</h6>
                     <ul>
                <p><i class="glyphicon glyphicon-envelope"></i> <?php echo tampil_pengaturan("email_usaha"); ?></p>
                <p><i class="glyphicon glyphicon-home"></i> <?php echo tampil_pengaturan("alamat_usaha"); ?></p>
                <p><i class="glyphicon glyphicon-earphone"> </i><?php echo tampil_pengaturan("telepon_usaha"); ?></p>
            </ul>
                </div>
            </div>
        </div>
    </div>
    
</div>

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
<script src="<?php  echo base_url("simibo/js/jquery.js"); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo  base_url("simibo/js/bootstrap.min.js"); ?>"></script>

</body>
</html>
