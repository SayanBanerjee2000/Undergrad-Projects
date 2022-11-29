<?php
include("connection.php");
$sql = "SELECT * FROM temp";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);
$chk_rows = mysqli_num_rows($res);
?>
<!DOCTYPE html>
<html>

<head>

    <title>Live Chat Support</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    <?php include "bot_style.css"?>
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<?php if($chk_rows == '1')
{?>
<body>
    <div>
        <a href="../admin/sub_admin_welcome.php" class="btn" style="background-color:#f9d342;color:black;font-size:1.5rem"><i class="fas fa-arrow-circle-left"></i>Back</a>
    </div>
    <div class="flex-center">
        <div id="chatbot" class="main-card">
            <div class="main-title">
                <div>
                    <i class="far fa-comment-alt fa-lg f-icon"></i>
                </div>
                <span><?php echo $row['name'];?></span>

            </div>
            <div id="chatbot-form" class="chatbox-form">
            </div>
            <div class="line"></div>
            <form action="chat_agent_set.php" method="POST">
                <div class="input-div">

                    <input type="hidden" name="hidden_id">
                    <input class="input-message" type="text" name="txt_agent" id="txt_agent"
                        placeholder="Type something here.." required />
                    <button type="submit" class="input-send" name="send_txt_agent">
                        <svg style="width:24px;height:24px">
                            <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z" />
                        </svg>
                    </button>

                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
    function display() {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "chat_agent_get.php", false);
        xmlhttp.send(null);
        document.getElementById("chatbot-form").innerHTML = xmlhttp.responseText;
    }
    display();
    setInterval(function() {
        display();
    }, 500);
    </script>

</body>
<?php 
}
else
{?>
<script type="text/javascript">
    alert('No user connected');
    window.location.href="../admin/sub_admin_welcome.php";
</script>
<?php
}
?>
</html>