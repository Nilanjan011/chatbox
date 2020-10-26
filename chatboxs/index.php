<!-- //chatbox   -->
<?php
session_start();
if ( isset($_SESSION['name'])){

    header("location:chatting.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <style>
    
         .login{
            box-shadow: 0px 0px 15px 0px #000;
            margin-top: 60px;
            padding: 20px;
            
         }
         
    </style>
</head>
<body>
    <div class="container">
        <div class="login col-md-4 offset-md-4">
            <h1 class="text-center bg-warning " >LOG IN</h1>
            
            <form action="welcome.php" onsubmit="return check()"  method="post" >
                <div class="form-group">
                    <label for="">username</label>
                    <input type="text" class="form-control" id="username" name="name">
                </div>
                <div class="form-group">
                    <label for="">password</label>
                    <input type="password" class="form-control"id="password" name="password"><br>
                    <input class="btn btn-primary btn-block btm2" type="submit" value="sumbit">
                </div>
            </form>
             <p class="g" ></p>
             <p>Not a member?<a href="reg.php">Register</a></p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
        // document.querySelector(".btm2").disabled=true;
        function check(){
            // console.log(document.querySelector("#password").value);
        
            if((document.querySelector("#password").value=="") || (document.querySelector("#username").value=="")){
                document.querySelector(".g").innerHTML=`<p class="text-danger text-center">your name and password can't blank</p>`;
            }else{
                document.querySelector(".btm2").disabled=false;
                document.querySelector(".btm1").style.display="none";
            }
            return false;
        }
    
    </script>

</body>
</html>