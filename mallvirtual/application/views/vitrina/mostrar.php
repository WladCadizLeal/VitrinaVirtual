<!--Main Slider-->
<section class="main-slider">
    <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
        <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
            <ul>
                <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1689" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/slides/v1-1.jpg" data-title="Slide Title" data-transition="parallaxvertical">

                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/index/imgslider.jpg">

                    <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-width="['1000','900','700','450']" data-whitespace="normal" data-hoffset="['15','15','15','15']" data-voffset="['200','155','140','110']" data-x="['center','center','center','center']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;">

                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
<!--End Main Slider-->

<div class="sec-title text-center" style="margin-top: 5%; margin-bottom:-6%;">
    <div class="title">Productos destacados</div>
</div>

<section id="blog-area" class="blog-default-area">
    <div class="container">
        <div class="row">
            <!--Start single blog post-->
            <?php foreach ($productos as $p) { ?>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="single-blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="img-holder">
                            <img src="<?php echo base_url($p['imagen']); ?>" height="100" width="100" />
                            <div class="overlay-style-two"></div>
                            <div class="post-date">
                                <h3><span>Fecha</span><br><?php echo $p['creado_en']; ?></h3>
                            </div>
                        </div>
                        <div class="text-holder">
                            <h3 class="blog-title"><a href="blog-single.html"><?php echo $p['nombre']; ?></a></h3>
                            <div class="meta-box">
                                <ul class="meta-info">
                                    <li><a href="#"><b><?php echo $p['categoria']; ?></b></a></li>
                                    <li><a href="#"><?php echo $p['local']; ?></a></li>
                                </ul>
                            </div>
                            <div class="text">
                                <p><?php echo $p['descripcion']; ?></p>
                                <a class="btn-two" href="#">Ver más<span class="icon-null"></span></a>
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