<?php 
include '../../Src/db_conn.php';
if (isset($_GET['updateid']) && is_numeric($_GET['updateid'])) {
    $id = intval($_GET['updateid']);

    // Récupérer les informations du package
    $result = $conn->query("SELECT name, description FROM Packages WHERE packageId = $id");
    if ($result && $package = $result->fetch_assoc()) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Name = $conn->real_escape_string($_POST['name']);
            $Description = $conn->real_escape_string($_POST['description']);
            

            // Mettre à jour les informations
            if ($conn->query("UPDATE Packages SET name='$Name', description='$Description' WHERE packageId=$id")) {
                echo "Package mis à jour avec succès.";
                header('Location:../adding/add_package.php');
            } else {
                echo "Erreur lors de la mise à jour : " . $conn->error;
            }
        }
    } else {
        echo "Package introuvable.";
        exit;
    }
} else {
    echo "ID d'update manquant ou invalide.";
    exit;
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

</head>
<body>
<div id="FormUpdate" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center ">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Package</h2>
        <button id="closeform" class="text-gray-500 hover:text-gray-700">&times;</button>
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
<script>

const form =document.getElementById('FormUpdate');

const closeform= document.getElementById('closeform')

closeform.addEventListener('click' ,() =>{
    form.classList.add('hidden');
    
})



</script>
</body>
</html>