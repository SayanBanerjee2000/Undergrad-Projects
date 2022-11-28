<?php
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
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
    margin-top: 75px;
    margin-left: 258px;
    width:700px;
	padding-top:10%;
    min-height: 400px;
    background: rgba(63, 55, 55, 0.158);
    border-radius: 10px;
    padding-left: 20%;
    padding: auto;
    justify-content: center;
    align-items: center;
    
    backdrop-filter: blur(5px);
    box-shadow: 0 25px 25px rgba(0,0,0,0.1);
    border: 1px solid rgba(255, 255, 255, 0.596);
    border-right: 1px solid rgba(255,255,255,0.2);
    border-bottom: 1px solid rgba(255,255,255,0.2);
}
.inputbox input
{
	position: inherit;
    width: 200px;
    background: rgba(255,255,255,0.2);
    border: none;
    outline: none;
    padding: 10px 10px;
    border-radius: 35px;
    border: 1px solid rgba(255,255,255,0.5);
    border-right: 1px solid rgba(255,255,255,0.2);
    border-bottom: 1px solid rgba(255,255,255,0.2);
    font-size: 12px;
}

.inputbox input::placeholder
{
    color: #fff;
}
.inputbox input[type="submit"]
{
    background: #dff1ff;
    color: #666;
	width:200px;
    max-width: 105px;
    cursor: pointer;
    margin-bottom: 20px;
    font-weight: 650;

}
</style>
</head>
<body>
  	<div class="container">
	<form action="result.php" method="POST">
		<table class="content-table" align="center">
			
			<tr>
				<td>Unique-Id</td>
				<td><input type="text" name="roll" placeholder="Provide your unique-id" required></td>
			</tr>

			<tr>
				<td>Session</td>
				<td><select name="session">
					<option value="learning">Learning Exam</option>
					<option value="semester">Semester Exam</option>
				</select></td>
			</tr>

			<div class="inputbox">
				<input type="submit" name="submit" value="Fetch Result">	
			</div>	

		</table>
	</form>
</div>
</body>
</html>