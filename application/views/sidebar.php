<div class="sub-cate">

        <div class=" top-nav rsidebar span_1_of_left">

            <h3 class="cate">CATEGORIES</h3>

            <ul class="menu">

                <li>

                    <ul class="kid-menu">
                        <li><a onclick="sm()" href="#">Sticker Motor</a></li>
                        <div style="background-color: #74e8c9;" id="hidesm">
                            <?php foreach ($kategorimotor as $key => $value): ?>

                                <li><a href="<?php echo base_url("kategori/produk/$value[id_kategori]"); ?>"><?php echo $value['nama_kategori']; ?></a></li>

                            <?php endforeach ?>
                        </div>
                        <li><a onclick="mobil()" href="#">Sticker Mobil</a></li>
                        <div style="background-color: #74e8c9" id="mobil">
                            <?php foreach ($kategorimobil as $key => $value): ?>
                                
                                <li><a href="<?php echo base_url("kategori/produk/$value[id_kategori]"); ?>"><?php echo $value['nama_kategori']; ?></a></li>

                            <?php endforeach ?>
                        </div>
                        <li><a onclick="aksesoris()" href="#">Aksesoris</a></li>
                        <div style="background-color: #74e8c9" id="aksesoris">
                            <?php foreach ($kategoriakses as $key => $value): ?>
                                
                                <li><a href="<?php echo base_url("kategori/produk/$value[id_kategori]"); ?>"><?php echo $value['nama_kategori']; ?></a></li>

                            <?php endforeach ?>
                        </div>
                        

                    </ul>

                </li>

            </ul>

        </div>

        <!--initiate accordion-->

        <script type="text/javascript">
         $(document).ready(function(e){

            $('#hidesm').hide();
            $('#mobil').hide();
            $('#aksesoris').hide();

            });

            $(function() {

                var menu_ul = $('.menu > li > ul'),

                menu_a  = $('.menu > li > a');

                menu_ul.hide();

                menu_a.click(function(e) {

                    e.preventDefault();

                    if(!$(this).hasClass('active')) {

                        menu_a.removeClass('active');

                        menu_ul.filter(':visible').slideUp('normal');

                        $(this).addClass('active').next().stop(true,true).slideDown('normal');

                    } else {

                        $(this).removeClass('active');

                        $(this).next().stop(true,true).slideUp('normal');

                    }

                });



            });

            function sm()
            {
                $('#hidesm').slideToggle();
            }
            function mobil()
            {
                $('#mobil').slideToggle();
            }
            function aksesoris()
            {
                $('#aksesoris').slideToggle();
            }

        </script>


    </div>