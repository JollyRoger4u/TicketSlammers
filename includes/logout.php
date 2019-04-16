<!DOCTYPE html>

<head>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/login.css">
</head>
<?php
include_once 'header.php';
require_once 'includes.php';
?>
<h2>
	You have been successfully logged out, welcome back another time!
</h2>

<img src="../img/bye.jpg">
</section>
<?php

session_destroy();

if (empty($_GET['status'])) {
	header('Location:logout.php?status=1');
	exit;
}

?>