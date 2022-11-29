<?php
include("connection.php");
$sql_total = "SELECT * FROM cart";
$res_total = mysqli_query($con, $sql_total);
$var_sum = 0;
while ($row = mysqli_fetch_array($res_total)) {
	$var_sum = $var_sum + $row['prod_price'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>User Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <script type="text/javascript">
    	
		function validate()
		{
			var phn = document.getElementById('ph_no');
			var email = document.getElementById('email');
		    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

			if(phn.value.length < 10 || phn.value.length > 10)
			{
				alert("Invalid Phone Number");
				phn.focus();
				return false;
			}

			if(!email.value.match(validRegex))
			{
				alert('Invalid Email address');
				email.focus();
				return false;
			}


		}


    </script>
</head>

<body>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Getting your Order</h2>
        </div>
        <form method="GET" action="cust_chk.php" onsubmit="return validate();">
            <input type="hidden" name="hidden_total" value="<?php echo $var_sum?>">
            <!-- <input type="hidden" name="hidden_cust_id" value="<?php echo $row['cust_id'];?>"> -->
            <div class="row">
                <div class="col-md-12 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fname">First name</label>
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lname">Last name</label>
                                <input type="text" class="form-control" name="lname" id="lname" placeholder="" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="addr">Address</label>
                            <input type="text" class="form-control" name="addr" id="addr" placeholder="1234 Main St"
                                required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="Kolkata"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter a valid city
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name="state" id="state"
                                    placeholder="West Bengal" required>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" name="zip" id="zip" placeholder="700001"
                                    required>
                                <div class="invalid-feedback">
                                    Zip code is required.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">

                        <h4 class="mb-3">Personal Information</h4>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="you@example.com" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ph_no">Phone Number</label>
                                <input type="number" class="form-control" name="ph_no" id="ph_no" placeholder="+91..."
                                    required>
                                <div class="invalid-feedback">
                                    Valid Phone Number is required.
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" name="cust_det" type="submit">Place your
                            Order</button>
                    </form>
                </div>
            </div>

            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2021-2022 Shoe Store</p>
            </footer>
        </form>
    </div>
</body>

</html>