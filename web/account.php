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

</head>

<body>

	<?php include("content/header.php"); ?>

	<div id="page">
		<div id="top">
			<?php include("content/login.php"); ?>
		</div>

		<div id="content">
			<?php if (isset($updated) && $updated) { ?>
				<p class="message_success">Your account was successfully updated</p>
			<?php } else if (isset($updated) && !$updated) { ?>
				<p class="message_error">There was an error saving your updates</p>
			<?php } ?>	
			<h2 class="form_title">Account Details</h2>
			<form action="account.php" method="POST">
				<input type="hidden" name="accessToken" value="<?php echo $accessToken; ?>"/>

				<div class="field">
					<label for="email">Email Address</label>
					<span class="field_value"><?php echo $user["email"]; ?></span>
				</div>

				<div class="field">
					<label for="apiKey">API Key</label>
					<span class="field_value"><?php echo $user["apiKey"]; ?></span>
				</div>

				<div class="field">
					<label for="url200">Success URL</label>
					<input name="url200" size="50" value="<?php echo $user['url200']; ?>"/>
				</div>

				<div class="field">
					<label for="url500">Error URL</label>
					<input name="url500" size="50" value="<?php echo $user['url500']; ?>"/>
				</div>

				<div class="field">
					<label for="active">Active</label>
					<input type="checkbox" name="active" <?php if ($user['active']) {echo 'checked';} ?>/>
				</div>
				<div class="form_buttons">
					<button type="submit" class="btn primary">Save Changes</button>
				</div>
			</form>

			<p style="margin:50px;text-align:center">Need an example? Check out a working <a href="sampleform.php">sample form</a>.</p>

		</div>

	</div>

	<?php include("content/footer.php"); ?>
	
</html>
