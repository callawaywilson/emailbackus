<?php
	require("lib/store.php");
	include("lib/auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>EmailBackUs - Contact Us</title>
	<link rel="stylesheet" href="css/screen.css" type="text/css"/>
	<link media="handheld, screen and (max-device-width: 640px)" href="css/mobile.css" type="text/css" rel="stylesheet" />
	<meta name="description" content="EmailBackUs Contact Us" />
	<meta name="keywords" content="email form processor web homepage agile back-end contact" />

	<?php include("content/analytics.php"); ?>

</head>

<body>

	<?php include("content/header.php"); ?>

	<div id="page">
		<div id="top">
			<?php include("content/login.php"); ?>
		</div>

		<div id="content">
			<div class="short_content">
				<h2>Thank You!</h2>
				<p>We'll get back to you as soon as possible.</p>
			</div>
		</div>

	</div>

	<?php include("content/footer.php"); ?>

</html>
