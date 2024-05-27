<?php
require "../connexion.php";

if (!array_filter($_POST)){
    echo "no data from from";
}else{
    print_r($_POST);
   
        $firstName = $_POST['first_name'];
     
   
        $lastName = $_POST['last_name'];
   
        $email = $_POST['email'];
   
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
    
};

echo $hash;

$query = $db->prepare('INSERT INTO users(email, password, first_name, last_name) VALUES(:email, :password, :first_name, :last_name)');
$parameters = [
    'email' => $email,
    'password' => $hash,
    'first_name' => $firstName,
    'last_name' => $lastName
];
$query->execute($parameters);
$user = $query->fetch(PDO::FETCH_ASSOC);


header('Location: ../index.php?route=home');

?>