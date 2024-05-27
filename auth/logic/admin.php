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

    }else{
      
    };
}

header('Location: ../index.php?route=admin');

?>