<style>
.modal-header {
    display: flex;
    align-items: flex-start;
}

button.close {
    margin-left: auto;
    padding-top: 0.5rem;
}

.modal-title,
button.close {
    font-size: 2rem;
}
</style>
<?php
if (isset($_POST['contact_us_submit'])) {
        $msg = $_POST['txt-msg'];
        $name = $_POST['contact_name'];
        $query = "SELECT * FROM temp";
        $res_query = mysqli_query($con, $query);
        $row_user = mysqli_fetch_array($res_query);
        $user_id = $row_user['loginid'];
        $sql_contact = "INSERT INTO contact_log SET cust_id = '$user_id', cust_name = '$name', msg = '$msg'";
        $res_contact = mysqli_query($con, $sql_contact);
        if($res_contact)
        {?>
            <script type="text/javascript">
            alert('Message submitted! Our agents will reply to you shortly.');
            window.location.href = "index.php";
            </script>
<?php   }
    }
?>
<div class="modal fade" id="contactUsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="contact_name">Name</label>
                            <input type="text" class="form-control" name="contact_name" id="contact_name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="txt-msg">Message</label>
                            <textarea class="form-control" name="txt-msg" id="txt-msg" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="contact_us_submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>