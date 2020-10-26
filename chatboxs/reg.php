<?php
    require_once("db.php");

    if (isset($_POST["submit"])) {
        if (isset($_POST["name"]) && !empty($_POST["name"])) {
            $name=$_POST["name"];
         
        } else {
            $n="please enter your name";
            
        }

        if (isset($_POST["password"])  && !empty($_POST["password"])) {
            $pass=$_POST["password"];
        } else {
            $p="please enter your password";
        }
        
        if (isset($name) && isset($pass)) {
            $insert= "INSERT INTO user (name,pass) VALUES(?,?)";
            $run=$con->prepare($insert)->execute([$name,$pass]);
        }

        if ($run) {
            header("location:index.php");
        }
        
    }

 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registation Form </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
         .login{
            border:0 2px 0 2px;
            background-color:rgb(180, 130, 130);
            margin-top: 60px;
            padding: 20px;
         }     

    </style>

</head>
<body>
    <div class="container">
            <div class="login col-md-4 offset-md-4">
                <h1 class="text-center bg-warning " >REGISTION FORM</h1>

                <?php
                    if (isset($n)) {
                        echo "<p class='text-danger'>$n</p>";
                    }

                    if (isset($p)) {
                        echo "<p class='text-danger'>$p</p>";
                    }
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">username</label>
                        <input type="text" class="form-control" id="username" name="name" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input type="password" class="form-control"id="password" name="password" required>
                        <br>
                        <input class="btn btn-primary btn-block btm2" type="submit" name="submit" value="sumbit">
                    </div>
                </form>
            </div>
        </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>