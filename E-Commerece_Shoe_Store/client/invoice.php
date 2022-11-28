<?php 
include("connection.php");
if(isset($_POST['inv_btn']))
{
  $id = $_POST['inv_val']; 
}

$sql_distinct = "SELECT DISTINCT user_id, total_amt, order_date, delivery_date, cust_name, cust_email, cust_addr, state, city, zip, cust_mobile, p_name, p_quantity, size FROM orders WHERE order_id = '$id'";
$res_distinct = mysqli_query($con, $sql_distinct);
$row_distinct = mysqli_fetch_array($res_distinct);

$sql_dis = "SELECT p_name, p_quantity, size, original_prc FROM orders WHERE order_id = '$id'";
$res_dis = mysqli_query($con, $sql_dis);

$delivery_date = $row_distinct['delivery_date'];  
$timestamp = strtotime($delivery_date);
$formattedDate = date('F d, Y', $timestamp);

$order_date = $row_distinct['order_date'];
$time_order = strtotime($order_date);
$formattedDate_order = date('F d, Y', $time_order);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
  <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/416491/timeline.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
  <meta charset="utf-8">
  <title>INVOICE <?php echo $id;?></title>
  <link rel="stylesheet" href="style.css" media="all" />
</head>
<body>

  <div id="print-btn"></div>
  <button class="btn btn-success" id="submit">PDF</button>
  <div id="print">
    <header class="clearfix">
        <h1>INVOICE <?php echo $id;?></h1>
        <div id="company" class="clearfix">
          <div>The Shoe Store</div>
        </div>
        <div id="project">
          <div><span>CUSTOMER NAME: <?php echo $row_distinct['cust_name'];?></span> </div>
          <div><span>ADDRESS: <?php echo $row_distinct['cust_addr'].",".$row_distinct['city'].",".$row_distinct['state'].",".$row_distinct['zip'];?></span> </div>
          <div><span>EMAIL: <?php echo $row_distinct['cust_email'];?></span> </div>
          <div><span>ORDER DATE:  <?php echo $formattedDate_order;?></span></div>
          <div><span>DELIVERY DATE: <?php echo $formattedDate;?></span> </div>
        </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">PRODUCT</th>
            <th class="service">SIZE</th>
            <th class="service">PRICE</th>
            <th class="service">QTY</th>
            <th class="service">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php 
            while($row_dis=mysqli_fetch_array($res_dis))
            {?>
            <td><?php echo $row_dis['p_name'];?></td>
            <td><?php echo $row_dis['size'];?></td>
            <td>Rs.<?php echo $row_dis['original_prc'];?></td>
            <td><?php echo $row_dis['p_quantity'];?></td>
            <td>Rs.<?php echo $row_dis['original_prc']*$row_dis['p_quantity'];?></td>
          </tr>
          <?php }?>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">Rs.<?php echo $row_distinct['total_amt'];?></td>
          </tr>

        </tbody>
      </table>
  </div>
</main>

<script>
    var doc = new jsPDF();
    var specialElementHandlers = {
    '#print-btn': function (element, renderer) {
        return true;
    }
};

$('#submit').click(function () {
    doc.fromHTML($('#print').html(), 25, 25, {
        'width': 1000,
            'elementHandlers': specialElementHandlers
    });
    doc.save('Invoice_<?php echo $id?>.pdf');
});
 

  </script>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>