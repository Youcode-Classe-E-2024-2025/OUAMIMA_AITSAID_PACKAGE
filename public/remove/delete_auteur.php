<?php 

include ('db_conn.php');

if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];
$sql ="DELETE FROM `Auteurs` WHERE AuteurId =$id";
$result =mysqli_query($conn,$sql);
if($result){
    echo "right";
}
else{
    die(mysqli_error($conn));
}

}





?>