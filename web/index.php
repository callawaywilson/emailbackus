<?php
	require("lib/store.php");
	include("lib/auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>EmailBackUs</title>
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
			<?php include("content/login.php"); ?>
		</div>

		<div id="content">
			<div class="content_section">
				<h2>How It Works</h2>
				<p>EmailBackUs is the world's simplest web form processor.  Just register an email address, set up your web form to point to us, and get your users' submissions instantly.  No back-end coding required.  You can use standard HTTP form posts that redirect back to your own thank you page.</p>
			</div>
			<div class="content_section">
				<h2>How Much It Costs</h2>
				<p>Nothing.  And our basic form processing never will.</p>
			</div>
			<div class="content_section">
				<h2>Small Websites &amp; Wordpress Forms</h2>
				<p>Creating a small business or personal web site?  There's no reason to buy PHP, Ruby, or Java development or services just to support your contact form!  Keep your site fast, lean, and clean and leave the back-end work to us.  Check out our <a href="help.php">how-to guide</a> to get your forms set up with no back-end programming whatsoever.</p>
			</div>
			<div class="content_section">
				<h2>Seamless Integration</h2>
				<p>Our form processor redirects back to your site at the HTTP level, so your users never know they've left your site.  Just set up a page for them to land on when they press 'Send' and that's the very next page they'll see.</p>
			</div>
		</div>

	</div>

	<?php include("content/footer.php"); ?>

</html>
