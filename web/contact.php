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
			<h2 class="form_title">Contact Us</h2>
			<p>You can send us an email with this form.  We'll get back to you as soon as possible.</p>
			<form action="submit.php" method="POST">
				<input type="hidden" name="apiKey" value="A644577E-E5BD-4F6E-904D-6630B0E6945E"/>

				<div class="field">
					<label for="name">Name</label>
					<input name="name" size="50" value=""/>
				</div>

				<div class="field">
					<label for="email">Email Address</label>
					<input name="email" size="50" value=""/>
				</div>

				<div class="field">
					<label for="subject">Subject</label>
					<input name="subject" size="50" value=""/>
				</div>

				<div class="field">
					<label for="message">Message</label>
					<textarea name="message" rows="5" cols="35" value=""></textarea>
				</div>

				<div class="form_buttons">
					<button type="submit" class="btn primary">Submit</button>
				</div>
			</form>
		</div>

	</div>

	<?php include("content/footer.php"); ?>

</html>
