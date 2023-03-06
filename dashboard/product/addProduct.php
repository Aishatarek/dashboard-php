<?php
include('../functions.php');
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {

        $name = "'" . $_POST['name'] . "'";
        $price = $_POST['price'];
        $description = "'" . $_POST['description'] . "'";
        $image =  $_FILES['image'];

        $brand = "'" . $_POST['brand'] . "'";
        $product->addProduct($name, $description, $price, $image, $brand);
    }
}
include("../header.php");
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
                                    <form action="" method="POST" class="login-email" enctype="multipart/form-data">
                                        <p style="font-size: 2rem; font-weight: 800;">Add Product</p>
                                        <div class="input-group">
                                            <input type="text" placeholder="Title" name="name" required class="form-control">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <input type="text" placeholder="Price" name="price" required class="form-control">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <textarea name="description" class="form-control"></textarea>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <input type="file" name="image" required class="form-control">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <input type="text" placeholder="brand" name="brand" required class="form-control">
                                        </div>
                                        <div class="input-group">
                                            <button name="submit" class="btn addtotable">add product</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('../footer.php');
?>