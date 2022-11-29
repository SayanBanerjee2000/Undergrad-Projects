<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
<?php 
include("conncetion.php");
$sql = "SELECT * FROM temp";
$res = mysqli_query($con, $sql);
$chk = mysqli_num_rows($res);
$row = mysqli_fetch_array($res);

include "bot_style.css"

?>
</style>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<div id="chatbot" class="main-card collapsed">
    <button id="chatbot_toggle">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M0 0h24v24H0V0z" fill="none" />
            <path
                d="M15 4v7H5.17l-.59.59-.58.58V4h11m1-2H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm5 4h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1z" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="display:none">
            <path d="M0 0h24v24H0V0z" fill="none" />
            <path
                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" />
        </svg>
        </svg>
    </button>
    <div class="main-title">
        <div>
            <svg viewBox="0 0 640 512" title="robot">
                <path fill="currentColor"
                    d="M32,224H64V416H32A31.96166,31.96166,0,0,1,0,384V256A31.96166,31.96166,0,0,1,32,224Zm512-48V448a64.06328,64.06328,0,0,1-64,64H160a64.06328,64.06328,0,0,1-64-64V176a79.974,79.974,0,0,1,80-80H288V32a32,32,0,0,1,64,0V96H464A79.974,79.974,0,0,1,544,176ZM264,256a40,40,0,1,0-40,40A39.997,39.997,0,0,0,264,256Zm-8,128H192v32h64Zm96,0H288v32h64ZM456,256a40,40,0,1,0-40,40A39.997,39.997,0,0,0,456,256Zm-8,128H384v32h64ZM640,256V384a31.96166,31.96166,0,0,1-32,32H576V224h32A31.96166,31.96166,0,0,1,640,256Z" />
            </svg>
        </div>
        
        <span>HappyFeet</span>

    </div>
    <?php 
    if($chk == '1')
        {?>
    <div class="chatbox-form">
        <div class="bot-inbox inbox">
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="msg-header">
                <p>Hello <?php echo $row['name'];?> I am HappyFeet, how can I help you?</p>
            </div>

        </div>
    <?php }
    else{
        ?>
        <div class="chatbox-form">
        <div class="bot-inbox inbox">
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="msg-header">
                <p>Hello there I am HappyFeet, how can I help you?</p>
            </div>

        </div>
    <?php }?>
        <div class="menu">
            <?php if($chk=='1')
            {?>
            <button id="order-status" class="btn btn-success" style="display:none">Order Status</button><?php }
            else
                {?>
            <button id="order-status" class="btn btn-success" style="display:none" disabled="">Order Status</button><?php }?>
            <button id="price-finder" class="btn btn-success" style="display:none">Shoe Price Finder</button>
        </div>

        <!-- <form method="POST">
            <input type="submit" style="margin-top: 30px; margin-bottom: 30px;" class="btn btn-success" name="od_stat" id="od_stat" value="Order Status">
            <input type="submit" name="shoe_prc" id="shoe_prc" class="btn btn-success" value="Shoe Price Finder">
            </form> -->




    </div>
    <div class="line"></div>
    <div class="input-div">
        <input class="input-message" name="data" type="text" id="data" placeholder="Type something here.." required />
        <button class="input-send" id="send-btn">
            <svg style="width:24px;height:24px">
                <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z" />
            </svg>
        </button>
    </div>
</div>
<script>
document.getElementById("data").addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        $("#send-btn").click();
    }
});
document.getElementById("chatbot_toggle").onclick = function() {
    if (document.getElementById("chatbot").classList.contains("collapsed")) {
        document.getElementById("chatbot").classList.remove("collapsed")
        document.getElementById("chatbot_toggle").children[0].style.display = "none"
        document.getElementById("chatbot_toggle").children[1].style.display = ""
        $('#order-status').delay(1000).show(0);
        $('#price-finder').delay(1000).show(0);
    } else {
        document.getElementById("chatbot").classList.add("collapsed")
        document.getElementById("chatbot_toggle").children[0].style.display = ""
        document.getElementById("chatbot_toggle").children[1].style.display = "none"
    }
}
$(document).ready(function() {
    $('#order-status').on("click", function() {
        $value = "Order Status";
        $txt_msg = "Mention Order ID";
        // $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
        // $(".chatbox-form").append($msg);
        $user_value = "Order Status";
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $user_value +
            '</p></div></div>';
        $(".chatbox-form").append($msg);
        $("#data").val('');

        // start ajax code
        $.ajax({
            url: 'message.php',
            type: 'POST',
            data: 'text=' + $value,
            success: function(result) {
                $replay =
                    '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' +
                    result  + '</p></div></div>';
                $(".chatbox-form").append($replay);
                if (result != "You do not have any placed order with us!") {
                $reply_txt =
                    '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' +
                    $txt_msg  + '</p></div></div>';
                    $(".chatbox-form").append($reply_txt);
                }
                //$(".chatbox-form").append($txt_msg);
                // when chat goes down the scroll bar automatically comes to the bottom
                $(".chatbox-form").scrollTop($(".chatbox-form")[0].scrollHeight);
            }
        });

    })
    $('#price-finder').on("click", function() {
        $value = $("#data").val();
        $txt_msg = "Mention Shoe colour, We will provide all the information";
        //$msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
        //$(".chatbox-form").append($msg);
        $user_value = "Shoe Price Finder";
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $user_value +
            '</p></div></div>';
        $(".chatbox-form").append($msg);
        $("#data").val('');

        // start ajax code
        $.ajax({
            url: 'message.php',
            type: 'POST',
            data: 'text=' + $value,
            success: function(result) {
                $replay =
                    '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' +
                    $txt_msg + '</p></div></div>';
                $(".chatbox-form").append($replay);
                // when chat goes down the scroll bar automatically comes to the bottom
                $(".chatbox-form").scrollTop($(".chatbox-form")[0].scrollHeight);
            }
        });

    })
    $("#send-btn").on("click", function() {
        $value = $("#data").val();
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value +
            '</p></div></div>';
        $(".chatbox-form").append($msg);
        $("#data").val('');

        // start ajax code
        $.ajax({
            url: 'message.php',
            type: 'POST',
            data: 'text=' + $value,
            success: function(result) {
                $replay =
                    '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' +
                    result + '</p></div></div>';
                $(".chatbox-form").append($replay);
                // when chat goes down the scroll bar automatically comes to the bottom
                $(".chatbox-form").scrollTop($(".chatbox-form")[0].scrollHeight);
            }
        });
    });
});
</script>