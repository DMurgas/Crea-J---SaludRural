<?php
include '../PHP/login.php';
session_start();
unset($_SESSION["correo"]);
session_destroy();
header("Location:../../HTML/login.php");
?>