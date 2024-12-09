<?php 
$conn =mysqli_connect("localhost","root","","Gestion_Package");

if($conn){
    echo "right connection";
}
else {
    die(mysqli_error($conn));
}

?>