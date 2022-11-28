<?php
if (isset($_POST['contact_us_submit'])) {
        $msg = $_POST['txt-msg'];
        $name = $_POST['contact_name'];
        // $query = "SELECT * FROM temp";
        // $res_query = mysqli_query($con, $query);
        // $row_user = mysqli_fetch_array($res_query);
        // $user_id = $row_user['loginid'];
        // $sql_contact = "INSERT INTO contact_log SET cust_id = '$user_id', cust_name = '$name', msg = '$msg'";
        // $res_contact = mysqli_query($con, $sql_contact);
        //if($res_contact)
        echo "$msg";
    }
?>