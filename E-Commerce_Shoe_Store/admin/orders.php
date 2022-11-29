<?php
include("connection.php");
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
                    <h1 class="page-header">Orders</h1>
                </div>
                <!-- /.col-lg-12 -->
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
                                            <th>Total Amount</th>
                                            <th>Order Date</th>
                                            <th>Delivery Date</th>
                                            <th>Customer Email</th>
                                            <th>Customer Address</th>
                                            <th>Customer State</th>
                                            <th>Customer City</th>
                                            <th>Customer Zip Code</th>
                                            <th>Customer Mobile</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$sql = "SELECT DISTINCT order_id, total_amt, order_date, delivery_date, cust_name, cust_email, cust_addr,state,city,zip,cust_mobile FROM `orders`";
$res=mysqli_query($con, $sql);
while($row=mysqli_fetch_array($res))
{
	$orderdate = date("d-m-Y", strtotime($row['order_date']));
	$deliverydate = date("d-m-Y", strtotime($row['delivery_date']));
	?>
                                        <tr>
                                            <td><?php echo $row['order_id'];?></td>
                                            <td><?php echo 'Rs.'.$row['total_amt'];?></td>
                                            <td><?php echo $orderdate;?></td>
                                            <td><?php echo $deliverydate;?></td>
                                            <td><?php echo $row['cust_email'];?></td>
                                            <td><?php echo $row['cust_addr'];?></td>
                                            <td><?php echo $row['state'];?></td>
                                            <td><?php echo $row['city'];?></td>
                                            <td><?php echo $row['zip'];?></td>
                                            <td><?php echo $row['cust_mobile'];?></td>
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