<?php
include("connection.php");
$roll = $_POST['roll'];
$session = $_POST['session'];

$sql = "SELECT * FROM feedback_exam where roll = '$roll' AND session='$session'";
$res=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<title></title>
	<style>
		  .content-table {
    padding: 32px;
     position: relative;
    justify-content: center;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    min-width: 400px;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  }
  
  .content-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
  }
  
  .content-table th,
  .content-table td {
    padding: 12px 15px;
  }
  
  .content-table tbody tr {
    border-bottom: 1px solid #dddddd;
  }
  
  .content-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
  }
  
  .content-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
  }
  
  .content-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
  }
  .container
{
    margin-top: 35px;
    margin-left: 268px;
    width:960px;
	padding-top:5%;
    min-height: 400px;
    background: rgba(63, 55, 55, 0.158);
    border-radius: 10px;
    padding-left: 18.5%;
    padding: auto;
    justify-content: center;
    align-items: center;
    
    backdrop-filter: blur(5px);
    box-shadow: 0 25px 25px rgba(0,0,0,0.1);
    border: 1px solid rgba(255, 255, 255, 0.596);
    border-right: 1px solid rgba(255,255,255,0.2);
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

</style>
<script>
function downloadCSV(csv, filename) {  
    var csvFile;  
    var downloadLink;  
     
    //define the file type to text/csv  
    csvFile = new Blob([csv], {type: 'text/csv'});  
    downloadLink = document.createElement("a");  
    downloadLink.download = filename;  
    downloadLink.href = window.URL.createObjectURL(csvFile);  
    downloadLink.style.display = "none";  
  
    document.body.appendChild(downloadLink);  
    downloadLink.click();  
}  
  
//user-defined function to export the data to CSV file format  
function exportTableToCSV(filename) {  
   //declare a JavaScript variable of array type  
   var csv = [];  
   var rows = document.querySelectorAll("table tr");  
   
   //merge the whole data in tabular form   
   for(var i=0; i<rows.length; i++) {  
    var row = [], cols = rows[i].querySelectorAll("td, th");  
    for( var j=0; j<cols.length; j++)  
       row.push(cols[j].innerText);  
    csv.push(row.join(","));  
   }   
   //call the function to download the CSV file  
   downloadCSV(csv.join("\n"), filename);  
}  
function printFunction() {
window.print();
}
</script>
</head>
<body>




<?php
$total=mysqli_num_rows($res);
if($total > 0)
{
	while ($row = mysqli_fetch_array($res)) {
		?>
		<div class= container>
		<table class= "content-table" align=center border='1'>
		<thead>
		<tr>
		<td><strong>Name</strong></td>
		<td><strong>Roll</strong></>
		<td><strong>Session</strong></td></tr>
	</thead>
		<tr>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['roll']?></td>
		<td><?php echo $row['session']?></td></tr></table>
		<p></p>
		<p></p>
		<table class= "content-table" align='center' border='1'>
		<thead>
		<th>Subject</th>
		<th>Marks</th>
		</thead>
		<tbody>
		<tr><td>English</td><td><?php echo  $row['english'] ?></td></tr>
		<tr><td>Mathematics</td><td><?php echo $row['maths']?></td></tr>
		<tr><td>Physics</td><td><?php echo $row['physics'] ?></td></tr>
		<tr><td>Chemistry</td><td><?php echo $row['chemistry']?></td></tr>
		<tr><td>Computer</td><td><?php echo $row['computer']?></td></tr>
		<tr><td>GPA</td><td><?php echo $row['gpa']?></td></tr>
		</tr>
		</tbody>
		</table>
	<?php
	}
}
else
{
	echo "<center><h2>Sorry no such student exist in database</h2></center>";
}
?>
<!-- <p>Print: <span class="glyphicon glyphicon-print"></span></p> -->
<a href="#" onclick="printFunction()" class="btn btn-success">PDF<span class="glyphicon glyphicon-print"></span></a><br>
<!-- <button onclick="printFunction()">Print</button> -->
<a href="#" class="btn btn-dark" onclick="exportTableToCSV('result.csv')">CSV<span class="glyphicon glyphicon-print"></span></a></br>
</div>
</body>
</html>
