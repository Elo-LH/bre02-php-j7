<?php

if (!array_filter($_GET)){
   $nickname = "guest";
  }else{
      if(isset($_GET['nickname'])){
        $_SESSION["nickname"]=$_GET['nickname'];
           $nickname = $_GET['nickname'];
         }
      
  }

  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
  </head>
  <body>
    <h1>Welcome <?=$nickname?></h1>
    <a href="logout.php">Déconnexion</a>
  </body>
  </html>