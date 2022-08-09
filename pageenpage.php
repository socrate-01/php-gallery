<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>			
			 <title>page en page </title>
       <script type="text/javascript" src="lightbox-plus-jquery.min.js"></script>
      <style type="text/css"> 
       img{
   transition-duration: 2s;
   }
   img:hover{
   transform: scale(1.3);
   }
.carte a:hover {
  background:white ;
  border: 2px solid black;
  color:rgb(0, 0, 0) ;
}
.carte a {
  background:black;
  outline: none;
  text-decoration: none;
  display: inline-block;
  width: 85px;
  margin-right: 0.625%;
  text-align: center;
  line-height: 2;
  color: white;
}

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
header h3 {
  margin-top: -10px;
}

</style> 
	</head>
	<body>
	
		<header>
      <h1>
       p a g e &nbsp  e n &nbsp   p a g e
      </h1>
    </header>

    <?php
   $dos = "images/";
    $dir= opendir($dos);
    $file=readdir($dir);
    $cnx = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    @$page = $_GET['page'];
    $limite = 4;
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $resultFoundRows = $cnx->query('SELECT count(id) FROM image');
/* On doit extraire le nombre du jeu de résultat */
$nombredElementsTotal = $resultFoundRows->fetchColumn();
    $debut = ($page - 1) * $limite;
    // Partie "Requête"
    /* On construit la requête, en remplaçant les valeurs par des marqueurs. Ici, on
     * n'a qu'une valeur, limite. On place donc un marqueur là où la valeur devrait se
     * trouver, sans oublier les deux points « : » */
    $query = 'SELECT * FROM image LIMIT :limite OFFSET :debut';
    /* On prépare la requête à son exécution. Les marqueurs seront identifiés */
    $query = $cnx->prepare($query);
    /* On lie ici une valeur à la requête, soit remplacer de manière sûre un marqueur par
     * sa valeur, nécessaire pour que la requête fonctionne. */

    $query->bindValue(
        'limite',         // Le marqueur est nommé « limite »
         $limite,         // Il doit prendre la valeur de la variable $limite
         PDO::PARAM_INT   // Cette valeur est de type entier
    );
    $query->bindValue('debut', $debut, PDO::PARAM_INT);
    /* Maintenant qu'on a lié la valeur à la requête, on peut l'exécuter */
    $query->execute();
    // Partie "Boucle"
    /* Ce qui se trouvait avant dans $resultSet est désormais dans $query, donc on doit
     * modifier ici aussi */
    while ($element = $query->fetch()) {
      $img=$element["nom"];
      ?>

<a data-lightbox="image" href="images/<?php echo $img; ?>">
       <img src="images/<?php echo $img; ?>" style="width:200px; height: 90px;" />
 </a>

     <?php   
    }
    ?>
    <?php
    $nombreDePages = ceil($nombredElementsTotal / $limite);
    if ($page > 1):
      ?>
      <div class="carte"><a href="?page=<?php echo $page - 1; ?>">Précédent</a></div><br><?php
  endif;
  
  /* On va effectuer une boucle autant de fois que l'on a de pages */
  for ($i = 1; $i <= $nombreDePages; $i++):
      ?><div class="carte"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></div><br><?php
  endfor;
  
  /* Avec le nombre total de pages, on peut aussi masquer le lien
   * vers la page suivante quand on est sur la dernière */
  if ($page < $nombreDePages):
      ?>
      <div class="carte" ><a href="?page=<?php echo $page + 1; ?>">Suivant</a></div><?php
  endif;
    ?>
    <script type="text/javascript" src="lightbox.js"></script>
	</body>
	</html>