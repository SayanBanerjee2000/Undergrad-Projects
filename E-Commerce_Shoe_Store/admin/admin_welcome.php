<?php
session_start();
if(empty($_SESSION['login_status']))
{
		header("Location: index.php");
		exit();
}
	include("connection.php"); 
    $sql = "SELECT * FROM `product`";
    $res = mysqli_query($con, $sql);
    $chk = mysqli_num_rows($res); 

    $qry = "SELECT DISTINCT order_id, total_amt, order_date, delivery_date, cust_name, cust_addr,state,city,zip,cust_mobile FROM `orders`";
    $rs  = mysqli_query($con, $qry);
    $cnt = mysqli_num_rows($rs);  

    $sql_approve = "SELECT * FROM product_temp WHERE status = '0'";
    $res_approve = mysqli_query($con, $sql_approve);
    $cnt_approve = mysqli_num_rows($res_approve);

    $sql_log = "SELECT * FROM admin_log WHERE status = '0'";
    $res_log = mysqli_query($con, $sql_log);
    $cnt_log = mysqli_num_rows($res_log);
    if (isset($_POST['txt_submit'])) {
        $msg = $_POST['txt_msg'];
        $sql_req = "INSERT INTO admin_log SET message = '$msg'";
        $res_req = mysqli_query($con, $sql_req);
        if($res_req)
        {?>
<script type="text/javascript">
alert('Log Updated');
window.location.href = "admin_welcome.php";
</script>
<?php }
    }
?>
<!-- /#wrapper -->
<!DOCTYPE html>
<html>

<head>
    <title>Admin Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">

    <style>
    <?php include "index.css"?>
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
                <a class="navbar-brand" href="admin_welcome.php">Shoe Store</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="change_pass.php"><i class="fas fa-wrench"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php" onClick="return(confirm('Do you really want to Logout?'))"><i
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
                    <h1 class="page-header">Admin Dashboard</h1>
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
                                    <div class="huge"><?php echo $chk?></div>
                                    <div>Products</div>
                                </div>
                            </div>
                        </div>
                        <a href="prod_mgmt.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
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
                                    <div class="huge"><?php echo $cnt?></div>
                                    <div>Orders</div>
                                </div>
                            </div>
                        </div>
                        <a href="orders.php">
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
                                    <i class="fa fa-tasks fa-5x" style="vertical-align: text-top;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $cnt_approve?></div>
                                    <div>Approval</div>
                                </div>
                            </div>
                        </div>
                        <a href="prod_approval.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
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
                                    <i class="fa fa-box fa-5x" style="vertical-align: text-top;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $cnt_log?></div>

                                    <div>Unfulfilled Requests</div>
                                </div>
                            </div>
                        </div>
                        <button class="panel-button" data-toggle="modal" data-target="#productRequestModal">
                            <div class="panel-footer">
                                <span class="pull-left">Send Product Request</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /#page-wrapper -->

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7/js/sb-admin-2.js"></script>

    <div class="modal fade" id="productRequestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="txt-msg">Message for Sub Admin</label>
                                <textarea class="form-control" name="txt_msg" id="txt_msg" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="admin_logger_request.php">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="txt_submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<!-- <!DOCTYPE html>
<html>
<head>
	<title>Admin Welcome</title>
</head>
<body>

	<table align="left">
		<tr>
			<td><a href="prod_mgmt.php">Product Manager</a></td>
		</tr>
		<tr>
			<td><a href="orders.php">View Orders</a></td>
		</tr>
		<tr>
			<td><a href="change_pass.php">Change Password</a></td>
		</tr>
		<tr>
			<td><a href="logout.php" onClick="return(confirm('Do you really want to Logout?'))">Logout</a></td>
		</tr>
	</table>

</body>
</html> -->