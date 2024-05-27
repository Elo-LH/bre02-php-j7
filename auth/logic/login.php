<?php
session_start();
require "../connexion.php";

if (!array_filter($_POST)){
    echo "no data from from";
}else{
    print_r($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
    
};

$query = $db->prepare('SELECT * FROM users WHERE email = :email');
$parameters = [
    'email' => $email,
];
$query->execute($parameters);
$user = $query->fetch(PDO::FETCH_ASSOC);

if (!$user){
echo "user not found";
}else {
    var_dump($user);
    $isPasswordCorrect = password_verify($password, $user['password']);
    if($isPasswordCorrect){
        echo "user found";
   $_SESSION['user'] = [
'firstName' => $user['first_name'],
'lastName' => $user['last_name'],
    ];
    }else {
        echo "wrong pasword";
    };
}


header('Location: ../index.php?route=home');

?>