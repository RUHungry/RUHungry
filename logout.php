<?php
session_start();

unset($_SESSION['islogin']);

session_destroy();

header("Location: index.php");
?>