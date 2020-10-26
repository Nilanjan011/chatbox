<?php
session_start();
if ( !isset($_SESSION['name'])){

    header("location:index.php");
}
 require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat Box</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
        .b1{
            position: absolute;
            left: -50px;
        }
    </style>

<script>
    function ajax1(){
        var req= new XMLHttpRequest();
        req.onreadystatechange = function(){
            if (req.readyState == 4 && req.status == 200) {
                document.getElementById("chat").innerHTML= req.responseText;
                
            }
        };

        req.open('GET','http://localhost/chatboxs/chat_ajax.php',true);
        req.send();
       
    }
    
    setInterval(function(){ajax1()},1000);
</script>
</head>
<body onload="ajax1()">
    <div class="container">

        <nav class="navbar sticky-top navbar-light" style="background-color:#e3f2fd;">
                <div class="navbar-brand">ChatBox</div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                             <button class=" btn btn-danger mr-auto"><a href="log.php?out=true">logout</a></button>
                        </li>
                    </ul>
        </nav>
        <div class="col-md-9 m-auto d-block" style="background-color:rgb(223, 189, 126);">
            <div>
                <div>
                    <div id="chat"></div>
                </div>
                <form action="chatting.php" method="post" class=" col-md-9 m-auto d-block">
                    <textarea class="form-control" name="msg" id="msg" cols="30" rows="10" required></textarea><br>
                    <input class="form-control btn-success" type="submit" name="submit" value="Send">
                </form>
                
            </div>
        </div>
    </div>

<?php
    if (isset($_POST['submit'])) {
        $name=$_SESSION['name'];
        $msg=$_POST['msg'];
        $insert= "INSERT INTO chat (name,msg) VALUES(?,?)";
        $run=$con->prepare($insert)->execute([$name,$msg]);

        if ($run) {
            echo "<embed loop='false' src='sms.mp3' hidden='true' autoplay='true'>";
        }
    }
?>


</body>
</html>