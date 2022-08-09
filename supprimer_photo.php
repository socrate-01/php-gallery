<!DOCTYPE html>
<html lang="fr">
<head>
       <title>Supprimer</title>
       </head>
  <body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, 'test');
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET["id"]) && isset($_GET["nom"])) {
  $img=$_GET["nom"];
  unlink("images/".$img);
  $ids=$_GET["id"];
  $sql = "DELETE FROM image WHERE id = $ids ; ";
  mysqli_query($conn, $sql);

}
header("Location:supprimer.php");
?>
</body>
  </html>