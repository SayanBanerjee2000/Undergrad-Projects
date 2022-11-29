<?php 
include("connection.php");
if (isset($_POST['update_cart']))
{
	$var1 = $_POST['hidden_price'];
	$var2 = $_POST['hidden_id'];
	$var3 = $_POST['qty'];
	$var4 = $var3 * $var1;
	$sql_con = "UPDATE `cart` SET `prod_price` = '$var4', `quantity` = '$var3' WHERE `id` = '$var2'";
	$result  = mysqli_query($con, $sql_con);
	if($result)
	{
		@header("Location: cart_home.php");
		exit();
	}
}
$query = "SELECT * FROM temp";
$res_query = mysqli_query($con, $query);
$chk_query = mysqli_num_rows($res_query);
$row_temp = mysqli_fetch_array($res_query);
$id = $row_temp['loginid'];

$sql_cart = "SELECT * FROM cart";
$res_cart = mysqli_query($con, $sql_cart);
$cnt_cart = mysqli_num_rows($res_cart);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/416491/timeline.css">
    <style>
    <?php include "cart.css"?>
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
        <div>
            <a href="index.php" class="btn" style="margin:1rem;background-color:#f9d342;color:black;font-size:1.7rem"><i
                    class="fas fa-arrow-circle-left"></i>
                Continue
                Shopping</a>
        </div>
        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Shopping Cart</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="shopping-cart">
                <div class="column-labels">
                    <label class="product-image">Image</label>
                    <label class="product-details">Product</label>
                    <label class="product-price">Price</label>
                    <label class="product-size">Size</label>
                    <label class="product-quantity">Quantity</label>
                    <label class="product-removal">Remove</label>
                    <label class="product-line-price">Total</label>
                </div>
                <?php
				$sql = "SELECT p.p_name, p.photo,c.user_id, c.prod_price,c.orig_price, c.quantity, c.id, c.size FROM product p, cart c where p.p_name=c.prod_name and c.user_id = '$id' ";
				$res = mysqli_query($con, $sql);
				$var_sum = 0;
				while($row = mysqli_fetch_array($res))
				{
					$var_sum = $var_sum + $row['prod_price'];
			?>
                <form method="POST" action="">

                    <div class="product">
                        <div class="product-image">
                            <img src="../admin/uploaded/<?php echo $row['photo']; ?>" border="0" alt="">
                        </div>
                        <div class="product-details">
                            <div class="product-title"><?php echo $row['p_name'];?></div>
                        </div>
                        <input type="hidden" name="hidden_price" value="<?php echo $row['orig_price'];?>">
                        <input type="hidden" name="hidden_name" value="<?php echo $row['p_name'];?>">
                        <input type="hidden" name="hidden_id" value="<?php echo $row['id'];?>">
                        <div class="product-price"><?php echo $row['orig_price'];?></div>
                        <form method="POST">
                            <div class="product-size"><?php echo $row['size']?></div>
                            <div class="product-quantity">
                                <input type="number" name="qty" value="<?php echo $row['quantity'];?>">
                            </div>
                            <div class="product-removal">
                                <input type="submit" class="update-product" name="update_cart" value="Update">
                                <a onClick="return(confirm('Do you really want to Delete?'))"
                                    href="cart_update.php?id=<?php echo $row['id']; ?>"
                                    class="remove-product">Remove</a>
                            </div>
                        </form>
                        <div class="product-line-price"><?php echo $row['prod_price']?></div>
                    </div>

                    <?php }?>

                    <div class="totals">
                        <div class="totals-item totals-item-total">
                            <label>Grand Total</label>
                            <div class="totals-value" id="cart-total"><?php echo $var_sum;?></div>
                        </div>
                    </div>

                <?php 
                if($cnt_cart>='1')
                {?>
                    <a href="checkout.php" class="checkout">Checkout <i class="fas fa-arrow-circle-right"></i></a>
                <?php 
                }
                else
                    {?>
                        <a href="" class="checkout" style="pointer-events: none;">Checkout <i class="fas fa-arrow-circle-right"></i></a>
                    <?php }?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>