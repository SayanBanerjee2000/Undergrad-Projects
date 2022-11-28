<?php
include("connection.php");

$sql_temp = "SELECT * FROM temp";
$res_temp = mysqli_query($con, $sql_temp);
$row_temp = mysqli_fetch_array($res_temp);
$id       = $row_temp['loginid'];

$sql_order_distinct_order_id = "SELECT DISTINCT order_id,total_amt,order_date,delivery_date FROM orders WHERE user_id ='$id'";
$res_order_distinct_order_id = mysqli_query($con, $sql_order_distinct_order_id);

//$row_order_total = mysqli_fetch_array($res_order_temp);
//$order_total_amt = $row_order_total['total_amt'];

?>
<!DOCTYPE html>
<html>

<head>
    <title>My Orders</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/416491/timeline.css">
    <style>
    <?php include "my_orders.css"?>
    </style>
</head>

<body>

    <div id="wrapper">
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
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw fa-2x"></i>
                    </a>
                     /.dropdown-user -->
                <!-- </li> -->
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <h1 class="page-header">Your Orders</h1>
            <div>
                <a href="index.php" class="btn" style="background-color:#f9d342;color:black;font-size:1.7rem"><i
                        class="fas fa-arrow-circle-left"></i>
                    Back</a>
            </div>
            <?php
        while($row_order_id = mysqli_fetch_array($res_order_distinct_order_id))
        {
        ?>
            <div class="order-wrapper">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order ID - #<?php echo $row_order_id['order_id'];?></h1>
                        <form method="POST" action="invoice.php">
                            <input type="hidden" name="inv_val" value="<?php echo $row_order_id['order_id'];?>">
                            <input type="submit" class="btn btn-success" name="inv_btn" value="Invoice">
                            <p></p>
                        </form>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <br>

                <div class="shopping-cart">
                    <div class="column-labels">
                        <label class="product-delivery-date" style="padding-left:2rem;">
                        <?php 
                        $delivery_date = $row_order_id['delivery_date'];
                        $timestamp = strtotime($delivery_date);
                        $formattedDate = date('F d, Y', $timestamp);
                        if($delivery_date>date('Y-m-d')) {
                            echo "To be delivered on ".$formattedDate;
                        }
                        else {
                            echo "Delivered on ".$formattedDate;
                        }
                         ?>

                        </label>
                        <label class="product-price">Price</label>
                        <label class="product-size">Size</label>
                        <label class="product-quantity">Quantity</label>
                        <label class="product-line-price">Total</label>
                    </div>
                    <?php
                $distinct_order_id = $row_order_id['order_id'];
                $sql_order= "SELECT * FROM orders WHERE order_id = '$distinct_order_id'";
                $res_order= mysqli_query($con, $sql_order);
				while($row_order_product_name = mysqli_fetch_array($res_order)) {
                    $item_name = $row_order_product_name['p_name'];
		            $sql_prod = "SELECT * FROM product WHERE p_name = '$item_name'";
		            $res_prod = mysqli_query($con, $sql_prod);
                    $product_details = mysqli_fetch_array($res_prod);
                ?>

                    <div class="product">
                        <div class="product-image">
                            <img src="../admin/uploaded/<?php echo $product_details['photo']; ?>" border="0" alt="">
                        </div>
                        <div class="product-details">
                            <div class="product-title"><?php echo $row_order_product_name['p_name']; ?></div>
                        </div>
                        <div class="product-price"><?php echo $product_details['price'];?></div>
                        <div class="product-size"><?php echo $row_order_product_name['size']; ?></div>
                        <div class="product-quantity">
                            <?php echo $row_order_product_name['p_quantity'];?>
                        </div>
                        <div class="product-line-price">
                            <?php 
                        $line_price = $row_order_product_name['p_quantity']*$product_details['price'];
                        echo $line_price; ?></div>
                    </div>
                <?php }

                    if($delivery_date>date('Y-m-d'))
                    {
                    ?>
                    <div class="totals">
                        <a onClick="return(confirm('Do you really want to cancel?'))"
                                                    href="cancel.php?id=<?php echo $row_order_id['order_id']; ?>"
                                                    class="btn btn-warning">Cancel</a>
                    <?php}
                    ?>
                        <div class="totals-item totals-item-total">
                            <label>Grand Total</label>
                            <div class="totals-value" id="cart-total"><?php echo $row_order_id['total_amt'];?></div>
                        </div>
                    </div>

                </div>
            </div>
            <?php }
	        }?>
        </div>
    </div>
</body>
</html>