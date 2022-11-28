<?php
session_start();
include("connection.php"); 
// if(empty($_SESSION['client_login_status']))
// {
//         header("Location: customer_login.php");
//         exit();
// }

$query = "SELECT * FROM temp";
$res_query = mysqli_query($con, $query);
$chk_query = mysqli_num_rows($res_query);
$row_temp = mysqli_fetch_array($res_query);
if($chk_query =='1')
{
    $id = $row_temp['loginid'];
    $sql_query = "SELECT * FROM `cart` WHERE user_id = '$id'";
    $result = mysqli_query($con, $sql_query);
    $cnt = mysqli_num_rows($result);
}
else
{
    $sql_query = "SELECT * FROM `cart` WHERE user_id = ''";
    $result = mysqli_query($con, $sql_query);
    $cnt = mysqli_num_rows($result);
}

?>
<!DOCTYPE html>
<html>

<head>

    <title>Shoe Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/416491/timeline.css">
    <style>
    <?php include "index.css"?>
    </style>
</head>

<body>
    <!-- Chatbot -->
    <?php require_once("bot.php") ?>

    <div id="wrapper">

        <!-- Navigation -->

        <nav class="navbar navbar-default navbar-static-top d-flex" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Shoe Store</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links" style="display:flex;justify-content:flex-end;">
                <!-- /.dropdown -->
                <?php

                if($chk_query =='1')
                {

                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw fa-2x"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><?php echo "Welcome,".$row_temp['name'];?></li>
                        <li><a href="my_orders.php"><i class="fas fa-truck"></i> My Orders</a>
                        </li>
                        <li><a href="change_pass.php"><i class="fas fa-wrench"></i> Change Password</a>
                        </li>
                        <li><a href="../Live_chat_agent/chat_user.php"><i class="fas fa-headset"></i> Live Chat
                                Support</a>
                        </li>
                        <li><a data-toggle="modal" data-target="#contactUsModal" style="cursor:pointer;"><i
                                    class="fas fa-envelope"></i> Contact
                                Us</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php" onClick="return(confirm('Do you really want to Logout?'))"><i
                                    class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <?php }
            else
                {
                    ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw fa-2x"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="customer_login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="signup.php"><i class="fas fa-user-plus"></i> Register</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <?php }?>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="cart_home.php">
                        <i class="fas fa-shopping-cart fa-2x"></i><span class="badge"
                            style="background-color: red;"><?php echo $cnt?></span>
                    </a>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <?php 
                    $title = "";
                    if (isset($_POST['search']))
                    {
                        $title = $_POST['search'];
                        $sql   = "SELECT * FROM `product` WHERE `p_name` LIKE '%$title%'";
                        $res   = mysqli_query($con, $sql);
                    }
                    else
                    {
                        //$title = $_POST['search'];
                        $sql = "SELECT * FROM `product` WHERE `p_name` LIKE '%$title%'";
                        $res   = mysqli_query($con, $sql);
                        $title = "";
                    }




                ?>
                <div class="col-lg-12">
                    <h1 class="page-header">Our Products</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                <!--<p align="right"><a href="https://wa.me/919903118027" target="_blank"><img src="whatsapp.png" width="50px"></a>&nbsp;<a href="chatbot.php"><img src="guide.png" width="50px"></a></p>-->

                <div class="col-lg-9 col-md-12">

                    <form action="" method="POST" class="search-form form">
                        <label class="search-label">
                            <span class="screen-reader-text">Search for...</span>
                            <input type="search" name="search" class="form-control search-field"
                                placeholder="Type something..." value="<?php echo $title?>" />
                        </label>
                        <button class="search-submit search-button"><i class="fas fa-search fa-2x"></i></button>


                    </form>
                    <h3 style="font-weight: bold;">Categories</h3>
                    <a href="index_men.php"><button class="btn btn-success">Men</button></a>
                    <a href="index_women.php"><button class="btn btn-success">Women</button></a>
                    <br>
                    <br>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 container d-flex flex-wrap">
                    <?php 
				while($row=mysqli_fetch_array($res))
  				{
  				?>
                    <form action="cart.php" method="GET" class="col-lg-4 col-md-6">
                        <div class="card">
                            <figure>
                                <img src="../admin/uploaded/<?php echo $row['photo']; ?>" style="height:340px" alt="">
                            </figure>
                            <section class="details">
                                <div class="min-details">
                                    <h1><?php echo $row['p_name'];?></h1>
                                    <h1 class="price">Rs.<?php echo $row['price'];?></h1>
                                </div>

                                <div class="options">
                                    <div class="options-size" style="display:flex">
                                        <h1>size : </h1>
                                        &nbsp;
                                        <input type="number" name="sz" min="6" max="11" class="card-input">
                                    </div>
                                    <div class="options-size" style="display:flex;margin-bottom:20px">
                                        <h1>quantity : </h1>
                                        &nbsp;
                                        <input type="number" name="qty" min="1" max="<?php echo $row['p_quantity']?>"
                                            class="card-input">
                                    </div>
                                </div>
                                <input type="hidden" name="pd_name" value="<?php echo $row["p_name"]; ?>">
                                <input type="hidden" name="pd_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add_to_cart" class="add-to-cart-btn" value="Add to Cart">
                            </section>
                        </div>

                    </form>
                    <?php
				}
				?>
                </div>
            </div>
            <!-- /.row -->
            <!-- /#page-wrapper -->

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.1/raphael.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7/js/sb-admin-2.js"></script>
    <script src="https://cdn.knightlab.com/libs/timeline3/latest/js/timeline.js"></script>
    <?php require_once("contact_us.php") ?>
</body>

</html>