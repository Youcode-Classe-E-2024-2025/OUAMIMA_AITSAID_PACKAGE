<?php 
session_start();
include ('../remove/db_conn.php');

$sql ="SELECT * from Packages";
 $result =mysqli_query($conn,$sql);
 if(!$result){
    echo 'Erreur lors de la récupération des données : ' . mysqli_error($conn);
 }
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
     $name = $_POST['name'] ?? '';
     $description = $_POST['description'] ?? '';
 
    
     if (!empty($name) && !empty($description)) {
         
         $requete = "INSERT INTO `Packages` (name, description) VALUES (?, ?)";
         $stmt = mysqli_prepare($conn, $requete);
 
         if ($stmt) {
             // Associer les variables à la requête préparée
             mysqli_stmt_bind_param($stmt, "ss", $name, $description);
 
             
             if (mysqli_stmt_execute($stmt)) {
                 echo '<script>alert("Package ajouté avec succès !");</script>';
                 header("Location: " . $_SERVER['PHP_SELF']); 
                 exit;
             } else {
                 echo '<script>alert("Erreur lors de l\'ajout : ' . mysqli_error($conn) . '");</script>';
             }
 
             mysqli_stmt_close($stmt);
         } else {
             echo '<script>alert("Erreur de préparation de la requête : ' . mysqli_error($conn) . '");</script>';
         }
     } else {
         echo '<script>alert("Veuillez remplir tous les champs.");</script>';
     }
 
     // Fermer la connexion
     mysqli_close($conn);
 }
include ('caractiristique.php');
 ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="../../assets/style.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>


</head>
<body>
<div class="sidebar "> 
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
                        <a href='../remove/delete_package.php?deleteid=" . $row['PackageId']. "' class='btn btn-delete'>delete</a>
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
<div id="Formulaire" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden ">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Package</h2>
        <button id="closeModal" class="text-gray-500 hover:text-gray-700">&times;</button>
      </div>

      
      <form id="popupForm" method="post" class="space-y-4">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
          <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <div>
          <label for="description" class="block text-sm font-medium text-gray-700">description</label>
          <textarea id="description" name="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">ADD</button>
      </form>
    </div>
  </div>



</div>
</body>
<script>

const form =document.getElementById('Formulaire');
const openform=document.getElementById('openForm');
openform.addEventListener('click',()=>{
    form.classList.remove('hidden');}

)



</script>
</html>