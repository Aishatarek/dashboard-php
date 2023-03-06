<?php
include('../functions.php');
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../index.php");
}
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_submit'])) {


        $name = "'" . $_POST['name'] . "'";
        $price = $_POST['price'];
        $description ="'" . $_POST['description']. "'";
        $image = $_FILES['image'];


        $brand = "'" . $_POST['brand'] . "'";
        $product->updateProduct($item_id, $name, $description, $price, $image, $brand);
    }
} include("../header.php");
?>
<div class="container-scroller">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>


            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include("../theSideNav.php"); ?>
        <div class="main-panel maindashboard">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="theform">

                <?php
                foreach ($product->getData() as $productt) :
                    if ($productt['id'] == $item_id) :

                ?>
                        <div class="theform2">
                     
                            <form method="post" enctype="multipart/form-data">
                                <input type="text" name="name" value="<?php echo $productt['title']; ?>" class="form-control">
                                <input type="text" name="price" value="<?php echo $productt['price']; ?>" class="form-control">
                                <textarea name="description"  class="form-control"><?php echo $productt['description']; ?></textarea>
                                <span class="d-flex">
                                    <img src="../../uploads/products/<?php echo $productt["image"] ?>" width="50px" alt="">
                               
                                </span>
                                <input type="file" name="image"  class="form-control">


                                <input type="text" name="brand" value="<?php echo $productt['brand']; ?>"  class="form-control">
                                <button type="submit" name="edit_submit" class="addtotable">submit</button>
                            </form>
                        </div>

                <?php

                    endif;
                endforeach;
                ?>
            </div>
        </div>
    </div>

    <?php
    include('../footer.php');
    ?>