<?php
include("connection.php");
session_start();
if(empty($_SESSION['sub_login_status']))
{
		header("Location: sub_admin_login.php");
		exit();
}
$sql = "SELECT * FROM admin_log WHERE status = '0'";
$res = mysqli_query($con, $sql);
$cnt_req = mysqli_num_rows($res);
$sql_prod="SELECT * FROM  `product` ORDER BY  `id` ASC ";
$res_prod=mysqli_query($con, $sql_prod);
$cnt_prod = mysqli_num_rows($res_prod);
$sql_order  = "SELECT DISTINCT order_id FROM orders";
$res_order = mysqli_query($con,$sql_order);
$cnt_order = mysqli_num_rows($res_order);
$sql_msg  = "SELECT * FROM contact_log";
$res_msg = mysqli_query($con,$sql_msg);
$cnt_msg = mysqli_num_rows($res_msg);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sub Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">

    <style>
    <?php include "index.css"?>
    </style>
    <style>
    .panel-heading {
        height: 14vh;
    }
    </style>
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="sub_admin_welcome.php">Shoe Store</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="sub_change_pass.php"><i class="fas fa-wrench"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="sub_logout.php" onClick="return(confirm('Do you really want to Logout?'))"><i
                                    class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sub-Admin Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-box-open fa-5x" style="vertical-align: text-top;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $cnt_prod?></div>
                                    <div>Products</div>
                                </div>
                            </div>
                        </div>
                        <a href="sub_admin_product_manager.php">
                            <div class="panel-footer">
                                <span class="pull-left">Product Manager</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x" style="vertical-align: text-top;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $cnt_req?></div>

                                    <div>Admin Requests</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin_request.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-headset fa-5x" style="vertical-align: text-top;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Chat</div>
                                    <div>With User</div>
                                </div>
                            </div>
                        </div>
                        <a href="../Live_chat_agent/chat_agent.php">
                            <div class="panel-footer">
                                <span class="pull-left">Open</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x" style="vertical-align: text-top;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $cnt_order?></div>
                                    <div>Orders</div>
                                </div>
                            </div>
                        </div>
                        <a href="orders_search_sub.php">
                            <div class="panel-footer">
                                <span class="pull-left">Search Order</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-cyan">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x" style="vertical-align: text-top;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $cnt_msg?></div>
                                    <div>Customer Messages</div>
                                </div>
                            </div>
                        </div>
                        <a href="cust_messages.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /#page-wrapper -->

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7/js/sb-admin-2.js"></script>
</body>

</html>