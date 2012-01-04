<?php
	require("lib/store.php");
	require("lib/mailer.php");

	if (array_key_exists('apiKey', $_POST)) {
		$apiKey = $_POST['apiKey'];
		$user = getUserByKey($apiKey);
	}
	if (is_null($user)) {
		header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
		$error_message = "Invalid API Key"; 
		include("403.html");
		exit;
	}
	// if ($_SERVER['REQUEST_METHOD'] == "POST") {
	// 	$user["url200"] = strip_tags($_POST["url200"]);
	// 	$user["url500"] = strip_tags($_POST["url500"]);
	// 	$user["active"] = isset($_POST["active"]);
	// 	$updated = saveUser($user);
	// }

	$params = array();
	foreach ($_POST as $key => $val) {
		if ($key != 'apiKey' && !empty($val)) {
			$params[$key] = $val;
		}
	}

	$result = mailForm($user, $params);


	if ($result && !empty($user["url200"])) {
		header( 'Location: ' . $user["url200"] );
		exit;
	} else if (!$result && !empty($user["url500"])) {
		header( 'Location: ' . $user["url500"] );
		exit;
	} else if ($result && empty($user["url200"])) {
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Thank you</title>
		<?php include("content/style.php"); ?>
	</head>
	<body>
		<div class="page">
			<div class="content">
				<h1>Thanks for your submission</h1>
				<?php if (array_key_exists('HTTP_REFERER', $_SERVER)) { ?>
					<p><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Return to site</a></p>
				<?php } ?>
			</div>
		</div>
	</body>
	</html>
<?php
	} else if (!$result && empty($user["url500"])) {
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Thank you</title>
		<?php include("content/style.php"); ?>
	</head>
	<body>
		<div class="page">
			<div class="content">
				<h1>There was an error processing your submission</h1>
				<?php if (array_key_exists('HTTP_REFERER', $_SERVER)) { ?>
					<p><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Return to site</a></p>
				<?php } ?>
			</div>
		</div>
	</body>
	</html>
<?php
	}
?>
