<?php
session_start();

if (isset($_SESSION['nickname'])){
require "welcome.php";
}else {
    require "nickname.php";
};


?>