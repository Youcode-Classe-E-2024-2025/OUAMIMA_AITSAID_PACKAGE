<?php 

include('db_conn.php');

if(isset($_GET['deleteid'])){
$id =$_GET['deleteid'];
$sql = "DELETE FROM versions WHERE versionId =$id";
$result =mysqli_query($conn,$sql);
if($result){
    header('Location:../adding/add_version.php');
}
else{
    die(mysqli_error($conn));
}


}


?>