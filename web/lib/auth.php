<?php

$user = NULL;
$accessToken = NULL;
if (array_key_exists('accessToken', $_GET)) {
	$accessToken = $_GET['accessToken'];
	$user = getUserByToken($accessToken);
	setcookie('accessToken', $accessToken, time() + (60 * 60 * 24));
} else if (array_key_exists('accessToken', $_POST)) { 
	$accessToken = $_POST['accessToken'];
	$user = getUserByToken($accessToken);
	setcookie('accessToken', $accessToken, time() + (60 * 60 * 24));
} else if (array_key_exists('accessToken', $_COOKIE)) {
	$accessToken = $_COOKIE['accessToken'];
	$user = getUserByToken($accessToken);
} 

?>