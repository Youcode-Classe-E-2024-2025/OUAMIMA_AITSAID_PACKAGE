<?php

include ('../../Src/db_conn.php');
if(isset($_GET['deleteid'])){

    $id =$_GET['deleteid'];
    $sql ="DELETE FROM `packages` WHERE packageId =$id";
    $result=mysqli_query($conn,$sql);
    if($result){
       header('Location:../adding/add_package.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>