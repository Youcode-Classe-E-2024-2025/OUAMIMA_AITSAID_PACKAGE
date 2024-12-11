<?php 
session_start();
include ('../remove/db_conn.php');

$sql ="SELECT * from Packages";
 $result =mysqli_query($conn,$sql);
 if($result){
    echo "tout est bien";
 }
 else{
    echo "error ";
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../assets/style.css">

</head>
<body>
<div class="sidebar"> 
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="../index.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="add_auteur.php"><i class="fas fa-user"></i> Auteurs</a></li>
            <li><a href="add_package.php"><i class="fas fa-box"></i> Packages</a></li>
            <li><a href="add_version.php"><i class="fas fa-code-branch"></i> Versions</a></li>
            <li><a href="#search"><i class="fas fa-search"></i> Search</a></li>
        </ul>
</div>
<div class="main-content">
        <div class="header">
            <h1>Welcome to the Dashboard</h1>
            <input type="text" placeholder="Search...">
            <button><a href="addPackage.php">Ajouter Auteurs</a></button>
        </div>
        <div class="content">
            <div class="card">
                <h3>Total Authors</h3>
                <p>10</p>
            </div>
            <div class="card">
                <h3>Total Packages</h3>
                <p>25</p>
            </div>
            <div class="card">
                <h3>Total Versions</h3>
                <p>100</p>
            </div> 
</div>
           <h2>List Packages</h2>
           <table class="fusion-table">
            <thead>
                <tr>
                    <th>Name_Package</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(mysqli_num_rows($result) > 0){
                    while($row =mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['name'] . "</td>";
                        echo "<td>".$row['description'] . "</td>";
                        echo "<td> 
                        <a href='remove/delete_auteur.php?deleteid=" . $row['PackageId']. "' class='btn btn-delete'>delete</a>
                        <a href='updating/update_auteur.php?updateid=" . $row['PackageId']. "' class='btn btn-update'>update</a>
                            </td>";
                    }}
                    else
                    {
                        echo "<tr> <td>veulliez ajouter de information</td></tr>";
                    }
                
                
                ?>
            </tbody>
           </table>



        
</div>
</body>
</html>