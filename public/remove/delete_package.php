<?php

include ('db_conn.php');
if(isset($_GET['deleteid'])){

    $id =$_GET['deleteid'];
    $sql ="DELETE FROM `Fusion` WHERE id =$id";
    $result=mysqli_query($conn,$sql);
    if($result){
       header('Location:../index.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>