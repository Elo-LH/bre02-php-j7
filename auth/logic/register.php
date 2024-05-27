<?php
require "../connexion.php";

$query = $db->prepare('SELECT * FROM users WHERE email = :email');
$parameters = [
    'email' => $email,
];
$query->execute($parameters);
$user = $query->fetch(PDO::FETCH_ASSOC);

if (!array_filter($_POST)){
  
    header('Location: ../index.php?route=inscription');
}else{
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = $db->prepare('SELECT * FROM users WHERE email = :email');
$parameters = [
    'email' => $email,
];
$query->execute($parameters);
$isEmailFound = $query->fetch(PDO::FETCH_ASSOC);

if($isEmailFound){
    header('Location: ../index.php?route=inscription&error=' . $email);

}else{

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
    
};
};

?>