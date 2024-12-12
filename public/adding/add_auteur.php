<?php 
session_start();
include ('../remove/db_conn.php');

$sql ="SELECT * from Auteurs";
 $result =mysqli_query($conn,$sql);
 if($result){
    echo "tout est bien";
 }
 else{
    echo "error ";
 }
include('caractiristique.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title><link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    

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
           <h2>List Auteurs</h2>
           <table class="fusion-table">
            <thead>
                <tr>
                    <th>Name_Auteur</th>
                    <th>Email_Auteur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(mysqli_num_rows($result) > 0){
                    while($row =mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['name'] . "</td>";
                        echo "<td>".$row['email'] . "</td>";
                        echo "<td> 
                        <a href='../remove/delete_auteur.php?deleteid=" . $row['AuteurId']. "' class='btn btn-delete'>delete</a>
                        <a href='updating/update_auteur.php?updateid=" . $row['AuteurId']. "' class='btn btn-update'>update</a>
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