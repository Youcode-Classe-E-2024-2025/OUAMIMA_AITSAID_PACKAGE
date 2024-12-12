<?php 



$sql_total ="SELECT COUNT(*) as total_packages FROM Packages";
$sql_totalA ="SELECT COUNT(*) as total_auteurs FROM Auteurs";
$sql_totalV ="SELECT COUNT(*) as total_versions FROM Versions";
$result_total =mysqli_query($conn,$sql_total); 
$result_totalA =mysqli_query($conn,$sql_totalA);
$result_totalV=mysqli_query($conn,$sql_totalV);
$total_packages =0;
$total_auteurs=0;
$total_versions =0;
if($result_total){
   $row_total =mysqli_fetch_assoc($result_total);
   $total_packages=$row_total['total_packages'];
}
if($result_totalA){
   $row_total =mysqli_fetch_assoc($result_totalA);
   $total_auteurs=$row_total['total_auteurs'];
}
if($result_totalV){
   $row_total =mysqli_fetch_assoc($result_totalV);
   $total_versions=$row_total['total_versions'];
}

?>