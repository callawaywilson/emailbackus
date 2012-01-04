<?php
	require("lib/store.php");
	include("lib/auth.php");
	setcookie ("accessToken", "", time() - 3600);
	if (isset($user)) {unset($user);}
	header( 'Location: http://'.$_SERVER['HTTP_HOST'] );
	exit;
?>