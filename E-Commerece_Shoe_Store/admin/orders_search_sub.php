<?php 
include("connection.php");
// $sql = "SELECT * FROM orders ORDER BY id ASC";
//$res = mysqli_query($con, $sql);

?>

<html>

<head>
    <title>Orders</title>
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
    <?php

$title = "";
if(isset($_POST['search']))
{
	$title = $_POST['search_order'];
	$sql_search = "SELECT DISTINCT order_id, order_date, delivery_date, total_amt, cust_name, cust_addr, cust_mobile, state, zip, city, cust_email FROM orders WHERE order_id = '$title' OR cust_name LIKE '%$title%' OR zip = '$title' OR cust_mobile = '$title'";
	$res_search = mysqli_query($con, $sql_search);
	//$chk_row = mysqli_num_rows($res_search)
}
else
{
	$sql_search = "SELECT DISTINCT order_id, order_date, delivery_date, total_amt, cust_name, cust_addr, cust_mobile, state, zip, city, cust_email FROM orders WHERE order_id = '$title' OR cust_name LIKE '%$title%' OR zip = '$title' OR cust_mobile = '$title'";
	$res_search = mysqli_query($con, $sql_search);
	$title="";
}


?>
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
                    <h1 class="page-header">Orders</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-12">

                    <form action="" method="POST" class="search-form form" style="margin-bottom:3rem">
                        <label class="search-label">
                            <span class="screen-reader-text">Search for...</span>
                            <input type="search" name="search_order" class="form-control search-field"
                                placeholder="Type something..." value="<?php echo $title?>" />
                        </label>
                        <button class="search-submit search-button" type="submit" name="search"><i
                                class="fas fa-search fa-2x"></i></button>


                    </form>



                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- /.panel -->
                    <!-- /.panel-heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="second-morris-table" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>Delivery Date</th>
                                            <th>Total Amount</th>
                                            <th>Customer Name</th>
                                            <th>Customer Email</th>
                                            <th>Customer Phone</th>
                                            <th>Address</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Zip Code</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
		while($row = mysqli_fetch_array($res_search))
		{
			$orderdate = date("d-m-Y", strtotime($row['order_date']));
	$deliverydate = date("d-m-Y", strtotime($row['delivery_date']));
	?>
                                        <tr>
                                            <td><?php echo $row['order_id'];?></td>
                                            <td><?php echo $orderdate;?></td>
                                            <td><?php echo $deliverydate;?></td>
                                            <td><?php echo 'Rs. '.$row['total_amt'];?></td>
                                            <td><?php echo $row['cust_name'];?></td>
                                            <td><?php echo $row['cust_email'];?></td>
                                            <td><?php echo $row['cust_mobile'];?></td>
                                            <td><?php echo $row['cust_addr'];?></td>
                                            <td><?php echo $row['state'];?></td>
                                            <td><?php echo $row['city'];?></td>
                                            <td><?php echo $row['zip'];?></td>
                                        </tr>
                                        <?php
		}
		?>

                                    </tbody>
                                </table>

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->


                    <!-- /.panel-body -->
                    <!-- /.panel -->
                    <!-- /.panel -->
                    <!-- /.col-lg-8 -->
                    <!-- /.col-lg-4 -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7/js/sb-admin-2.js"></script>
</body>

</html>