<?php 
$conn =mysqli_connect("localhost","root","","Gestion_Packages");

if($conn){
    echo "right connection";
}
else {
    die(mysqli_error($conn));
}
    

?>