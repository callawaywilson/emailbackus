<?php
	require("lib/store.php");
	include("lib/auth.php");
	 
	if (is_null($user)) {
		header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
		include("403.html");
		exit;
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$user["url200"] = strip_tags($_POST["url200"]);
		$user["url500"] = strip_tags($_POST["url500"]);
		$user["active"] = isset($_POST["active"]);
		$updated = saveUser($user);
	}
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

	<link href="css/prettify.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="js/prettify.js"></script>
</head>

<body onload="prettyPrint()">

	<?php include("content/header.php"); ?>

	<div id="page">
		<div id="top">
			<?php include("content/login.php"); ?>
		</div>

		<div id="content">
			<h2 class="form_title">My Sample Form</h2>
			<form action="submit.php" method="POST">
				<input type="hidden" name="apiKey" value="<?php echo $user["apiKey"]; ?>"/>

				<div class="field">
					<label for="email">Email Address</label>
					<input name="email" class="form_input" value=""/>
				</div>

				<div class="field">
					<label for="subject">Subject</label>
					<input name="subject" class="form_input" value=""/>
				</div>

				<div class="field">
					<label for="message">Message</label>
					<textarea name="message" rows="5"  class="form_input" value=""></textarea>
				</div>

				<div class="field">
					<label for="respond">Respond?</label>
					<input type="checkbox" name="respond"/>
				</div>

				<div class="form_buttons">
					<button type="submit" class="btn primary">Submit</button>
				</div>
			</form>

			<h2 class="form_title">My Sample Form's Source</h2>
			<pre class="prettyprint code" style="font-size: 12px">
&lt;form action="http://emailback.us/submit.php" method="POST"&gt;
	&lt;input type="hidden" name="apiKey" 
		value="<?php echo $user["apiKey"]; ?>"/&gt;

	&lt;div class="field"&gt;
		&lt;label for="email"&gt;Email Address&lt;/label&gt;
		&lt;input name="email" value=""/&gt;
	&lt;/div&gt;

	&lt;div class="field"&gt;
		&lt;label for="subject"&gt;Subject&lt;/label&gt;
		&lt;input name="subject" value=""/&gt;
	&lt;/div&gt;

	&lt;div class="field"&gt;
		&lt;label for="message"&gt;Message&lt;/label&gt;
		&lt;textarea name="message" value=""&gt;&lt;/textarea&gt;
	&lt;/div&gt;

	&lt;div class="field"&gt;
		&lt;label for="respond"&gt;Respond?&lt;/label&gt;
		&lt;input type="checkbox" name="respond"/&gt;
	&lt;/div&gt;

	&lt;div class="form_buttons"&gt;
		&lt;button type="submit"&gt;Submit&lt;/button&gt;
	&lt;/div&gt;
&lt;/form&gt;			
			</pre>
		</div>

	</div>

	<?php include("content/footer.php"); ?>
	
</html>
