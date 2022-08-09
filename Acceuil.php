<?php 
if(!empty($_FILES)){
   $img= $_FILES['img'];
   $ext=strtolower(substr($img['name'],-3));
   $allow_ext = array('gif','png','jpg');
       if(in_array($ext,$allow_ext)){
          move_uploaded_file($img['tmp_name'],"images/".$img['name']);
        }
  
        else {
          $erreur = "verifiez l'extension si c'est 'png', 'gif', 'png'" ;
        }
}
?>

<?php
if(isset($_POST['ajouter'])){
  $img=$_FILES['img']['name'];
$type=$_FILES['img']['type'];
$size = $_FILES['img']['size'];

$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, 'test');

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO image(nom, typee, size) VALUES ('$img', '$type','$size')";

if (mysqli_query($conn, $sql)) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}


?>



	<!DOCTYPE html>
	<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta  name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ir=edge">
		   <link rel="stylesheet" href="style.css" />
       <link rel="stylesheet" href="form.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"/>
		<title>Bibliothèques</title>
	</head>
	<body>
	   <nav>
      <div class="logo">
        <a href=""><i class="fas fa-align-left"></i> bibliothèques</a>
      </div>
         </nav>

    <header>
      <h1>
        Bienvenue,
      </h1>
      <h3>
        veuillez charger une image pour l'ajouter dans la gallery.
      </h3>
    </header>

    <section class="cartes">
      <div class="carte">
        <?php
     if(isset($erreur)){ echo '<p style="color:black;" >'. $erreur.'</p>';}
     ?>
        <h1>Ajouter une image</h1>
        <hr />
      <form method="POST" action="Acceuil.php" enctype="multipart/form-data">
        <input  type="file" name="img"/></br>
        <input type="submit" name="ajouter" value="Ajouter">
      </form>
        </div>
 </section>
    <footer>
      <div class="gauche">
        &copy; 2021, projet developpement WEB 
      </div>
    </footer>
  </body>
	</html>