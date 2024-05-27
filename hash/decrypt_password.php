<?php

if (isset($_POST['passwordTest'])){
    $passwordTest = $_POST['passwordTest'];
 };
 if (isset($_POST['hashTest'])){
    $hashTest = $_POST['hashTest'];
 };

 $isPasswordCorrect = password_verify($passwordTest, $hashTest);

 if($isPasswordCorrect){
    echo "Mot de passe correct";
 }else{
    echo "Mot de passe erroné";

 }

?>