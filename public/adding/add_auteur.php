<?php 
session_start();
//include 
include ('../../Src/db_conn.php');

$sql ="SELECT * from Auteurs";
 $result =mysqli_query($conn,$sql);
 if($result){
    echo "tout est bien";
 }
 else{
    echo "error ";
 }
//Ajouter un auteur

 if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'] ?? '';
    $email=$_POST['email'] ?? '';
    if(!empty($name) && !empty($email)){
        $sqlA ="INSERT INTO Auteurs (name,email) VALUES (?,?)";
        $resultA=mysqli_prepare($conn,$sqlA);

        if($resultA){
            mysqli_stmt_bind_param($resultA,"ss",$name,$email);
            if(mysqli_stmt_execute($resultA)){
                echo '<script> alert( "l\'auteur bien ajouter") </script>';
                header ('Location:' . $_SERVER['PHP_SELF']);
            }
            else {
                echo '<script> alert( "error lors ajout : . ' .mysqli_error($conn) .'") </script>';
            }
        }
        mysqli_stmt_close($conn);
       
    }
    else{
        echo '<script> alert( "veulliez remplire les champs") </script>';
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
    <title>Dashboard</title><link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
<div class="main-content font-bold">
        <div class="header ">
            <h1 >Gestion Package</h1>
            <input type="text" placeholder="Search...">
            <button id="openForm">Add Auteur</button>
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
<div id="Formulaire" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden ">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Version</h2>
        <button id="closeform" class="text-gray-500 hover:text-gray-700">&times;</button>
      </div>

      
      <form id="popupForm" method="post" class="space-y-4">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">name</label>
          <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">email</label>
          <input  type="email" id="email" name="email" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></input>
        </div>
       

        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">ADD Version</button>
      </form>
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