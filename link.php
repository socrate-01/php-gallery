

<!DOCTYPE html>
<html lang="fr">
<head>

			<title>Main </title>
			<style type="text/css">
				header {
  margin-top: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 20px;
  box-shadow: -4px 6px 29px -11px rgba(166, 166, 166, 0.75);
  -webkit-box-shadow: -4px 6px 29px -11px rgba(166, 166, 166, 0.75);
  -moz-box-shadow: -4px 6px 29px -11px rgba(166, 166, 166, 0.75);
}
 #lien{
  margin:auto;
   }
   a {
  outline: none;
  text-decoration: none;
  display: inline-block;
  width: 15%;
    border: 1px solid black;
  margin-right: 0.625%;
  text-align: center;
  line-height: 3;
  color: black;
    }
      a:link, a:visited, a:focus {
  background:#20B2AA;
}
   a:hover {
  background: white;
   }
			</style>
	</head>
	<body>
		<header>
      <h1>
      	
        Liens
      </h1>
      
    </header>

  <div id="lien">
 
  <?php

$dos = "images/";
$dir= opendir($dos);
$i=1;
  while($file=readdir($dir)){
     $allow_ext=array("jpg",'png','gif');
     $ext= strtolower(substr($file,-3));
        if(in_array($ext,$allow_ext)){
        
          
?>

          <a href="images/<?php echo $file; ?>"><?php echo $i ; $i=$i+1;?></a>
          
          <?php

}
}
?>
	</body>
	</html>