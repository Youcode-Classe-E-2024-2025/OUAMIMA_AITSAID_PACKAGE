<?php 
session_start();
include ('./remove/db_conn.php');

$sql ="SELECT 
    package_auteur.id, 
    Versions.version_number, 
    Packages.PackageId,
    Packages.name as pname,
    Packages.description,
    Auteurs.AuteurId, 
    Auteurs.name,
    Auteurs.email
FROM 
    package_auteur
INNER JOIN Packages ON package_auteur.PackageId = Packages.PackageId
INNER JOIN Auteurs ON package_auteur.AuteurId = Auteurs.AuteurId
INNER JOIN Versions ON Versions.PackageId = Packages.PackageId";
 $result =mysqli_query($conn,$sql);
 if($result){
    echo "tout est bien";
 }
 else{
    echo "error ";
 }
 include('adding/caractiristique.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/style.css">

</head>
<body>
<div class="sidebar"> 
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="./adding/add_auteur.php"><i class="fas fa-user"></i> Auteurs</a></li>
            <li><a href="./adding/add_package.php"><i class="fas fa-box"></i> Packages</a></li>
            <li><a href="./adding/add_version.php"><i class="fas fa-code-branch"></i> Versions</a></li>
            <li><a href="#search"><i class="fas fa-search"></i> Search</a></li>
        </ul>
</div>
<div class="main-content">
        <div class="header">
            <h1>Welcome to the Dashboard</h1>
            <input type="text" placeholder="Search...">
            <button id="openForm">Add Package</button>
        </div>
        <div class="content">
            <div class="card">
                <h3>Total Auteurs</h3>
                <p><?php  echo $total_auteurs;?></p>
            </div>
            <div class="card">
                <h3>Total Packages</h3>
                <p><?php echo $total_packages;?></p>
            </div>
            <div class="card">
                <h3>Total Versions</h3>
                <p><?php  echo $total_versions;?></p>
            </div> 
</div>
           <h2>List fusions</h2>
           <table class="fusion-table">
            <thead>
                <tr>
                    <th>Name_Package</th>
                    <th>Description_Package</th>
                    <th>Name_Auteur</th>
                    <th>Email_Auteur</th>
                    <th>version_number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(mysqli_num_rows($result) > 0){
                    while($row =mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['pname'] . "</td>";
                        echo "<td>".$row['description'] . "</td>";
                        echo "<td>".$row['name'] . "</td>";
                        echo "<td>".$row['email'] . "</td>";
                        echo "<td>".$row['version_number'] . "</td>";
                        echo "<td>
                        <a href='./remove/delete_package_auteur.php?deleteid=" . $row['id']. "' class='btn btn-delete'>delete</a>
                        <a href='updating/update_package.php?updateid=" . $row['id']. "' class='btn btn-update'>update</a>
                        
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