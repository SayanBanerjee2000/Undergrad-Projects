<?php 
include("connection.php"); 
?>
<html>

<head>
    <title>Product Approval System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/416491/timeline.css">
    <style>
    body {
        background-color: #f8f8f8;
    }

    #wrapper {
        width: 100%;
    }

    #page-wrapper {
        padding: 0 15px;
        min-height: 95vh;
        background-color: #fff;
    }

    @media(min-width:768px) {
        #page-wrapper {
            position: inherit;
            margin: 0;
            padding: 0 30px;
            border-left: 1px solid #e7e7e7;
        }
    }

    .navbar {
        min-height: 5vh;
    }

    .navbar-top-links {
        margin-right: 0;
    }

    .navbar-top-links li {
        display: inline-block;
    }

    .navbar-top-links li:last-child {
        margin-right: 15px;
    }

    .navbar-top-links li a {
        padding: 15px;
        min-height: 50px;
    }

    .navbar-top-links .dropdown-menu li {
        display: block;
    }

    .navbar-top-links .dropdown-menu li:last-child {
        margin-right: 0;
    }

    .navbar-top-links .dropdown-menu li a {
        padding: 3px 20px;
        min-height: 0;
    }

    .navbar-top-links .dropdown-menu li a div {
        white-space: normal;
    }

    .navbar-top-links .dropdown-messages,
    .navbar-top-links .dropdown-tasks,
    .navbar-top-links .dropdown-alerts {
        width: 310px;
        min-width: 0;
    }

    .navbar-top-links .dropdown-messages {
        margin-left: 5px;
    }

    .navbar-top-links .dropdown-tasks {
        margin-left: -59px;
    }

    .navbar-top-links .dropdown-alerts {
        margin-left: -123px;
    }

    .navbar-top-links .dropdown-user {
        right: 0;
        left: auto;
    }

    .sidebar .sidebar-nav.navbar-collapse {
        padding-right: 0;
        padding-left: 0;
    }

    .sidebar .sidebar-search {
        padding: 15px;
    }

    .sidebar ul li {
        border-bottom: 1px solid #e7e7e7;
    }

    .sidebar ul li a.active {
        background-color: #eee;
    }

    .sidebar .arrow {
        float: right;
    }

    .sidebar .fa.arrow:before {
        content: "\f104";
    }

    .sidebar .active>a>.fa.arrow:before {
        content: "\f107";
    }

    .sidebar .nav-second-level li,
    .sidebar .nav-third-level li {
        border-bottom: 0 !important;
    }

    .sidebar .nav-second-level li a {
        padding-left: 37px;
    }

    .sidebar .nav-third-level li a {
        padding-left: 52px;
    }

    @media(min-width:768px) {
        .sidebar {
            z-index: 1;
            position: absolute;
            width: 250px;
            margin-top: 51px;
        }

        .navbar-top-links .dropdown-messages,
        .navbar-top-links .dropdown-tasks,
        .navbar-top-links .dropdown-alerts {
            margin-left: auto;
        }
    }

    .btn-outline {
        color: inherit;
        background-color: transparent;
        transition: all .5s;
    }

    .btn-primary.btn-outline {
        color: #428bca;
    }

    .btn-success.btn-outline {
        color: #5cb85c;
    }

    .btn-info.btn-outline {
        color: #5bc0de;
    }

    .btn-warning.btn-outline {
        color: #f0ad4e;
    }

    .btn-danger.btn-outline {
        color: #d9534f;
    }

    .btn-primary.btn-outline:hover,
    .btn-success.btn-outline:hover,
    .btn-info.btn-outline:hover,
    .btn-warning.btn-outline:hover,
    .btn-danger.btn-outline:hover {
        color: #fff;
    }

    .chat {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .chat li {
        margin-bottom: 10px;
        padding-bottom: 5px;
        border-bottom: 1px dotted #999;
    }

    .chat li.left .chat-body {
        margin-left: 60px;
    }

    .chat li.right .chat-body {
        margin-right: 60px;
    }

    .chat li .chat-body p {
        margin: 0;
    }

    .panel .slidedown .glyphicon,
    .chat .glyphicon {
        margin-right: 5px;
    }

    .chat-panel .panel-body {
        height: 350px;
        overflow-y: scroll;
    }

    .login-panel {
        margin-top: 25%;
    }

    .flot-chart {
        display: block;
        height: 400px;
    }

    .flot-chart-content {
        width: 100%;
        height: 100%;
    }

    .dataTables_wrapper {
        position: relative;
        clear: both;
    }

    table.dataTable thead .sorting,
    table.dataTable thead .sorting_asc,
    table.dataTable thead .sorting_desc,
    table.dataTable thead .sorting_asc_disabled,
    table.dataTable thead .sorting_desc_disabled {
        background: 0 0;
    }

    table.dataTable thead .sorting_asc:after {
        content: "\f0de";
        float: right;
        font-family: fontawesome;
    }

    table.dataTable thead .sorting_desc:after {
        content: "\f0dd";
        float: right;
        font-family: fontawesome;
    }

    table.dataTable thead .sorting:after {
        content: "\f0dc";
        float: right;
        font-family: fontawesome;
        color: rgba(50, 50, 50, .5);
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        padding: 6px 0;
        border-radius: 15px;
        text-align: center;
        font-size: 12px;
        line-height: 1.428571429;
    }

    .btn-circle.btn-lg {
        width: 50px;
        height: 50px;
        padding: 10px 16px;
        border-radius: 25px;
        font-size: 18px;
        line-height: 1.33;
    }

    .btn-circle.btn-xl {
        width: 70px;
        height: 70px;
        padding: 10px 16px;
        border-radius: 35px;
        font-size: 24px;
        line-height: 1.33;
    }

    .show-grid [class^=col-] {
        padding-top: 10px;
        padding-bottom: 10px;
        border: 1px solid #ddd;
        background-color: #eee !important;
    }

    .show-grid {
        margin: 15px 0;
    }

    .huge {
        font-size: 40px;
    }

    .panel-green {
        border-color: #5cb85c;
    }

    .panel-green>.panel-heading {
        border-color: #5cb85c;
        color: #fff;
        background-color: #5cb85c;
    }

    .panel-green a {
        color: #5cb85c;
    }

    .panel-green a:hover {
        color: #3d8b3d;
    }

    .panel-red {
        border-color: #d9534f;
    }

    .panel-red>.panel-heading {
        border-color: #d9534f;
        color: #fff;
        background-color: #d9534f;
    }

    .panel-red a {
        color: #d9534f;
    }

    .panel-red a:hover {
        color: #b52b27;
    }

    .panel-yellow {
        border-color: #f0ad4e;
    }

    .panel-yellow>.panel-heading {
        border-color: #f0ad4e;
        color: #fff;
        background-color: #f0ad4e;
    }

    .panel-yellow a {
        color: #f0ad4e;
    }

    .panel-yellow a:hover {
        color: #df8a13;
    }

    #morris-bar-chart {
        /*-webkit-transition: all 2s;*/
        /* Safari */
        /*transition: all 2s;*/
    }

    #morris-table-left-div {
        /*height: 350px;
  overflow: hidden;*/
    }

    .header-row {
        /*padding: 0 18px;*/
    }

    .header-column {
        /*font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  display: inline-block;
  font-weight: 300;
  color: #555;*/
        /*border: 1px solid grey;*/
        /*padding: 0px;
  width: 24%;*/
        /*box-sizing: border-box;*/
        /*content-box|border-box|initial|inherit;*/
    }

    .list-group-column {
        /*font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  display: inline-block;
  font-weight: 300;
  color: #555;*/
        /*border: 1px solid grey;
  padding: 0px;
  width: 24%;
}*/
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
                    <h1 class="page-header">Product Approval System</h1>
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
                                            <th>Product Id</th>
                                            <th>Category Id</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$sql="SELECT * FROM  `product_temp` WHERE status = '0' ";
$res=mysqli_query($con, $sql);
while($row=mysqli_fetch_array($res))
{
?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['cat_id']; ?></td>
                                            <td><?php echo $row['pd_name']; ?></td>
                                            <td><?php echo $row['pd_quantity']; ?></td>
                                            <td><?php echo $row['pd_price']; ?></td>
                                            <td><a href="approve_chk.php?id=<?php echo $row['id']; ?>"
                                                    class="btn btn-success"><img src="../images/approval.png" width="20" height="20">
                                                    Approve</a></td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.1/raphael.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7/js/sb-admin-2.js"></script>
    <script src="https://cdn.knightlab.com/libs/timeline3/latest/js/timeline.js"></script>
</body>

</html>