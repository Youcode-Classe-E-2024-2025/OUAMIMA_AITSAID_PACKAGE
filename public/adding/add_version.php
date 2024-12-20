<?php 
session_start();
include ('../../Src/db_conn.php');
$query ="SELECT PackageId,name from Packages";
$resultP=mysqli_query($conn,$query);
if(!$resultP){
    echo 'error';
}
$sql ="SELECT * from Versions";
 $result =mysqli_query($conn,$sql);
 if($result){
    echo "tout est bien";
 }
 else{
    echo "error ";
 }
if($_SERVER['REQUEST_METHOD'] === 'POST'){
$version_number = $_POST['version_number'] ?? '';
$creation_date =$_POST['creation_date'] ?? '';
$Package_Id =intval($_POST['Package_Id'] )?? '';

if(!empty($version_number ) && !empty($creation_date) && !empty($Package_Id)){
    $sqlVersion ='INSERT INTO Versions (version_number,creation_date,PackageId) VALUES (? ,? ,? )';
    $resultV =mysqli_prepare($conn,$sqlVersion);
    if($resultV){
        mysqli_stmt_bind_param($resultV,'ssi',$version_number,$creation_date,$Package_Id);
        if(mysqli_stmt_execute($resultV)){
            echo 'bien';
            header('Location:'. $_SERVER['PHP_SELF']);
            exit;
        }
        else{
            echo '<script>alert("Erreur lors de l\'ajout : ' . mysqli_error($conn) . '");</script>';
        }
        mysqli_stmt_close($conn);
    }
    else { 
        echo '<script>alert("Erreur de préparation de la requête : ' . mysqli_error($conn) . '");</script>';
    }

}
else{
    echo '<script> alert ("veulliez remplire les champs"); </script>';
}
mysqli_close($conn);
}
include('caractiristique.php');

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
<body class="text-gray-700  font-bold">
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
            <h1 >Gestion Package</h1>
            <input type="text" placeholder="Search...">
            <button id="openForm">Add Version</button>
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
           <h2>List versions</h2>
           <table class="fusion-table">
            <thead>
                <tr>
                    <th>version_number</th>
                    <th>Création_Date</th>
                    <th>PackageId</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(mysqli_num_rows($result) > 0){
                    while($row =mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['version_number'] . "</td>";
                        echo "<td>".$row['creation_date'] . "</td>";
                        echo "<td>".$row['packageId'] . "</td>";
                        echo "<td> 
                        <a href='../remove/delete_version.php?deleteid=" . $row['versionId']. "' class='btn btn-delete'>delete</a>
                        <a href='updating/update_auteur.php?updateid=" . $row['versionId']. "' class='btn btn-update'>update</a>
                            </td>";
                    }}
                    else
                    {
                        echo "<tr> <td>veulliez ajouter de information</td></tr>";
                    }
                
                
                ?>
            </tbody>
           </table>


    <div id="Formulaire" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden ">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Version</h2>
        <button id="closeform" class="text-gray-500 hover:text-gray-700">&times;</button>
      </div>

      
      <form id="popupForm" method="post" class="space-y-4">
        <div>
          <label for="version_number" class="block text-sm font-medium text-gray-700">version_number</label>
          <input type="text" id="version_number" name="version_number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <div>
          <label for="description" class="block text-sm font-medium text-gray-700">creation_date</label>
          <input  type="date" id="creation_date" name="creation_date" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></input>
        </div>
        <div>
            <select name="Package_Id" class="block text-sm font-medium text-gray-700" id="Package_Id" required>
            <option value="" >Choissez un Package</option>
            <?php while ($row =$resultP->fetch_assoc()):?>
            <option value="<?= $row['PackageId']?>"><?= htmlspecialchars($row['name'])?></option>
            <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">ADD Version</button>
      </form>
    </div>
  </div>



</div>
        
</div>
<script>

const form =document.getElementById('Formulaire');
const openform=document.getElementById('openForm');
const closeform= document.getElementById('closeform')
openform.addEventListener('click',()=>{
    form.classList.remove('hidden');}

)
closeform.addEventListener('click' ,() =>{
    form.classList.add('hidden');
})



</script>
</body>
</html>