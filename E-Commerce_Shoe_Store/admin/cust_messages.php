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
                    <h1 class="page-header">Customer Messages</h1>
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
                                            <th>Customer ID</th>
                                            <th>Customer Name</th>
                                            <th>Message</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql_msg = "SELECT * FROM contact_log";
                                        $res_msg = mysqli_query($con, $sql_msg);
		while($row = mysqli_fetch_array($res_msg))
		{
	?>
                                        <tr>
                                            <td><?php echo $row['cust_id'];?></td>
                                            <td><?php echo $row['cust_name'];?></td>
                                            <td><?php echo $row['msg'];?></td>
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