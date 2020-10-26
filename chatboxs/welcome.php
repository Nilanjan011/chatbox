<?php

    session_start();

    if (isset($_REQUEST["name"]) && isset($_REQUEST["password"])) {
         $name=$_REQUEST["name"];
         $pass1=$_REQUEST["password"];    
    } else {
        header('http://localhost/chatboxs/index.php');

    }//ata ami run kore deki ni 
    

    $host="localhost";
    $user="root";
    $pass="";
    $db="chatbox";
    $pdo=new PDO("mysql:host=$host;dbname=$db",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="select * from user where name=? and pass=?";
    $stmt=$pdo->prepare($sql);
    $res=$stmt->execute([$name,$pass1]);
    
    if ($res) {
        $data=$stmt->fetch(PDO::FETCH_ASSOC);
        if($data){
            $_SESSION['name'] = $data['name'];
    
            header("location:chatting.php");

        }else {
            header("location:reg.php?l=you are not register person");
        }
       
    }

    $pdo=null;

?>
