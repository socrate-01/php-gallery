<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta  name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ir=edge">
    <link rel="stylesheet" type="text/css" href="lightbox.min.css">
    <title>tous les photos </title>
    <script type="text/javascript" src="lightbox-plus-jquery.min.js"></script>
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
   img{
   transition-duration: 2s;
   }
   img:hover{
   transform: scale(1.3);
   }

   </style>

</head>

  <body>
    <header>
      <h1>
        A l b u m s
      </h1>
      
    </header>
<?php
$dos = "images/";
$dir= opendir($dos);
  while($file=readdir($dir)){
     $allow_ext=array("jpg",'png','gif');
     $ext= strtolower(substr($file,-3));
        if(in_array($ext,$allow_ext)){
?>
          <a data-lightbox="image" href="images/<?php echo $file; ?>">
            <img src="images/<?php echo $file; ?>" style="width:200px; height: 90px;"/>
          </a>
<?php
}
}
?>
<script type="text/javascript" src="lightbox.js"></script>

  </body>
  </html>