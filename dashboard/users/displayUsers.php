<?php
ob_start();
include('../functions.php');
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../index.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem'])) {
        $Users->deleteUser($_POST['item_id']);
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
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <a href="addUser.php" class="addtotable">اضافه مستخدم</a>

                        
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">الاسم</th>
                                       
                                            <th scope="col">الايميل</th>
                                            <th scope="col">الهاتف</th>
                                            


                                            <th>-</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($Users->getData() as $user) :
                                        ?>
                                            <tr>
                                                <td><?php echo $user["name"] ?></td>

                                                <td><?php echo $user["email"] ?></td>
                                                <td><?php echo $user["phone"] ?></td>


                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                    <a href="<?php printf('%s?id=%s', 'updatePassword.php',  $user['id']); ?>">
                                                            <button class="btn btn-outline-info">تغيير كلمه السر</button>
                                                        </a>
                                                        <form method="post">
                                                            <input type="hidden" value="<?php echo $user["id"] ?>" name="item_id">
                                                            <button name="deleteItem" class="mx-1 btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                        <a href="<?php printf('%s?id=%s', 'updateUser.php',  $user['id']); ?>">
                                                            <button class="btn btn-outline-info"><i class="fa fa-edit"></i></button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
</div>
<?php
include("../footer.php");
?>