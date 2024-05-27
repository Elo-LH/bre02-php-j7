<?php
session_start();
require "../connexion.php";


if (array_filter($_SESSION) && $_SESSION['user']['role'] === 'admin'){
    if (isset($_GET['delete'])){
        $email = $_GET['delete'];
        $query = $db->prepare('DELETE FROM users WHERE email = :email');
$parameters = [
    'email' => $email,
];
$query->execute($parameters);
$isUserDeleted = $query->fetch(PDO::FETCH_ASSOC);

    }else if(isset($_GET['toggleAdmin'])){
        $isAdmin= $_GET['toggleAdmin'];
        $email = $_GET['email'];
      if($isAdmin === "true"){
      
        $query = $db->prepare('UPDATE users SET role= null WHERE email = :email');
        $parameters = [
            'email' => $email,
        ];
        $query->execute($parameters);
        $isAdminDeleted = $query->fetch(PDO::FETCH_ASSOC);
      }else{
    
        $query = $db->prepare('UPDATE users SET role= "admin" WHERE email = :email');
        $parameters = [
            'email' => $email,
        ];
        $query->execute($parameters);
        $isAdminAdded = $query->fetch(PDO::FETCH_ASSOC);
      }
    };
}

 header('Location: ../index.php?route=admin');

?>