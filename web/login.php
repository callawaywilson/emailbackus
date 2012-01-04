<?php

	require("lib/mailer.php");
	require("lib/store.php");

	$email = $_POST["email"];
	$is_new = false;

	if ( strlen($email) < 5) {
		$invalid_email = true;
	} else {
		$user = getUserByEmail($email);
		if (is_null($user)) {
			$user = createNewUser($email);
			mailRegister($user);
			$is_new = true;
		} else {
			$user = genToken($user);
			mailLogin($user);
		}
	}
		
?>
<!DOCTYPE html>
<html>
<head>
	<title>EmailBackUs - </title>
	<link rel="stylesheet" href="css/screen.css" type="text/css"/>
	<link media="handheld, screen and (max-device-width: 640px)" href="css/mobile.css" type="text/css" rel="stylesheet" />
	<meta name="description" content="Frictionless Web Form Processing" />
	<meta name="keywords" content="email form processor web homepage agile back-end" />

	<?php include("content/analytics.php"); ?>

</head>

<body>

	<?php include("content/header.php"); ?>

	<div id="page">
		<div id="top">
		</div>

		<div id="content">
			<div class="short_content">
			<?php if ($is_new) { ?>
				<h2>Welcome to EmailBackUs!</h2>
				<p>We've sent you an email with access to your new account.  Just click on the link in the email and you'll be able to finish your setup.  If you don't see it, check your spam folder.  Remember to mark it not spam so your form submissions won't be flagged!</p>
			<?php } else { ?>
				<p>We've sent you an email with a link to your account.  If you don't see it, check your spam folder.</p>
			<?php } ?>
			</div>
		</div>

	</div>

	<?php include("content/footer.php"); ?>
	
</html>