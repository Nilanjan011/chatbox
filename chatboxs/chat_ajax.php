<?php
    include("db.php");


    try {
        $sql="select * from chat";
        $stmt=$con->prepare($sql);
        $stmt->execute();

        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
?>          <div>
                <span style='color:green;'><?php echo $row['name']; ?></span>:
                <span style='color:red;'><?php echo $row['msg'];?></span> <br>
            </div>
<?php        
        }
    
    } catch (\Throwable $th) {
        echo "problem is $th";
    }
    // echo $stmt->rowCount();
    



?>