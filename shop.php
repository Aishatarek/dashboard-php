<?php
include('dashboard/functions.php');
$products = $product->getLimitedData();

include('header.php');
?>
<section class="shopSec1">
    <h3>Shop</h3>
    <div>
        <a href="index.php">Home</a>
        <p> /Shop</p>
    </div>
</section>

<section class="container">
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="imgggshop">
            <img src="images/home-repair-3_1080x.png"  alt="">
            </div>
            <div class="row">
                <?php
                foreach ($products as $productt) { ?>
                    <div class="col-md-6 col-sm-12 ">
                        <div class="cardy">
                            <a href="<?php printf('%s?id=%s', 'productDetail.php',  $productt['id']); ?>">
                                <img src="uploads/products/<?php echo $productt['image'] ?>" alt="">
                                <p><?php echo $productt['title']; ?></p>
                            </a>
                            <p>$<?php echo $productt['price']; ?></p>
                            
                        </div>
                    </div>
                <?php
                } ?>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="serachhh">
                <h3>Search</h3>
                <form>
                    <input type="text" placeholder="Search">
                    <div><i class="fas fa-search"></i></div>
                </form>
            </div>

        </div>
    </div>
</section>


<?php
include('footer.php');
?>