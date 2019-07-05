<div class="sec-title text-center" style="margin-top: 5%; margin-bottom:-6%;">
    <div class="title">Resultados obtenidos al buscar "<?php echo $busqueda ?>"</div>
</div>

<section id="blog-area" class="blog-default-area">
    <div class="container">
        <div class="row">
            <!--Start single blog post-->
            <?php foreach ($results as $row) { ?>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                    <div class="single-blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">

                        <a href="<?php echo site_url('producto/inicio_producto/' . $row->id); ?>">
                            <div class="img-holder">
                                <img src="<?php echo base_url($row->imagen); ?>" height="100" width="100" />
                                <div class="overlay-style-two"></div>
                                <div>
                                    <h3><span>Precio</span><br>$<?php echo number_format(($row->precio), 0, ".", "."); ?></h3>
                                </div>
                            </div>
                        </a>
                        <div class="text-holder">
                            <h3 class="blog-title"><a href="<?php echo site_url('producto/inicio_producto/' . $row->id); ?>"><?php echo $row->nombre; ?></a></h3>
                            <div class="meta-box">
                                <ul class="meta-info">
                                    <li><a href="#"><b><?php echo $row->categoria; ?></b></a></li>
                                    <li><a href="#"><?php echo $row->local; ?></a></li>
                                </ul>
                            </div>
                            <div class="text">
                                <!-- <p></p> -->
                                <a href="<?php echo site_url('producto/inicio_producto/' . $row->id); ?>" class="btn-two"><span class="glyphicon-eye-open"></span>Ver Mas</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!--End single blog post-->
        </div>
    </div>
</section>
<!--End blog area-->