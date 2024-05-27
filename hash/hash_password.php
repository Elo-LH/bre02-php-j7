<?php

if (isset($_POST['password'])){
   $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
};
echo $hash;
?>