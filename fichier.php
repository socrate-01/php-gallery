<?php      

if(!empty($_FILES)){
    $img=$_POST['img'];
   
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>


<form method="POST" action="fichier.php">
<input type="file" name="img" /><br/>
<input type="submit" value="envoyer" name="send"/>
</form>


</body>
</html>