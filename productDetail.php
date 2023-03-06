<?php
include('dashboard/functions.php');
$mostRecent = $product->getRecentedData();
$item_id=$_GET['id'];
include('header.php');






foreach ($product->getData() as $productt) :
    if ($productt['id'] == $item_id) :
?>
        <section id="product" class="py-3 container">
            <div class="row">
                <div class="theslides col-md-6 col-sm-12">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="uploads/products/<?php echo $productt['image'] ?>" />
                            </div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="uploads/products/<?php echo $productt['image'] ?>" />
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 prodetail">
                    <h3><?php echo $productt["title"] ?></h3>
                    <h3>$<?php echo $productt["price"] ?></h3>
                    <h5><?php echo $productt["brand"] ?></h5>
                    <p><?php echo $productt["description"] ?></p>

                </div>
            </div>
        </section>

        <!--   !product  -->
<?php
    endif;
endforeach; ?>

<section class="container seventhSec">
    <h3>Most Recent</h3>
    <p>We are happy to introduce the new Lawson Collection. These are three quartz models designed with simplicity and elegance kept in mind. They come in different sizes and colors, and all feature a stainless steel back — leaving enough space for a personalized engraving. The engraving service is complimentary with any watch from the Lawson series.</p>
    <div class="row">
        <?php

        foreach ($mostRecent as $productt) { ?>
            <div class="col-md-4 col-sm-12">
                <div class="cardy">
                    <img src="uploads/products/<?php echo $productt['image'] ?>" alt="">
                    <a href="<?php printf('%s?id=%s', 'productDetail.php',  $productt['id']); ?>">
                        <p><?php echo $productt['title']; ?></p>
                    </a>

                    <p>$<?php echo $productt['price']; ?></p>
                 
                </div>
            </div>

        <?php

        } ?>
    </div>

</section>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>
<?php
include('footer.php');
?>