<!DOCTYPE html>
<html lang="fr">
<head>

			 <title>Supprimer</title>
			 </head>
	<body>
		<header>
<h1>S u p p r i m e r</h1>
</header>
		<table>
			<style>
header {
  margin-top: 30px;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 20px;
  box-shadow: -4px 6px 29px -11px rgba(166, 166, 166, 0.75);
  -webkit-box-shadow: -4px 6px 29px -11px rgba(166, 166, 166, 0.75);
  -moz-box-shadow: -4px 6px 29px -11px rgba(166, 166, 166, 0.75);
}
header h1 {
  margin-top: -10px;
}

a {
  outline: none;
  text-decoration: none;
  display: inline-block;
  width: 150px;
  margin-right: 0.625%;
  text-align: center;
  line-height: 2;
  color: rgb(255, 255, 255);
}
a:link,.cartes .carte a:visited, .cartes .carte a:focus {
 /*background: #20B2AA;*/
 background: #000303;
}
a:hover {
  background:white ;
  border: 2px solid black;
  color:rgb(0, 0, 0) ;
}
				</style>
			<?php

$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, 'test');

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM image;";

$result =mysqli_query($conn, $sql); 
while ($row=mysqli_fetch_assoc($result)) {
	echo "<td>".
	$row["nom"]."</td>"
	."<td><a href='supprimer_photo.php?id=".$row["id"]."&amp;nom=".$row["nom"]."'>Supprimer</a> </td><tr>";
}

?>
		</table>
</body>
	</html>