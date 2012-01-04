<?php
	
	require("class.phpmailer.php");

	function getMailer() {
		$pm = new PHPMailer();
		$pm->IsSMTP(true);
		$pm->Host = 'localhost:25';
		$pm->SMTPAuth = false;
		$pm->SetFrom('mailer@emailback.us', 'EmailBackUs Mailer');
		return $pm;
	}

	function mailRegister($user) {
		$pm = getMailer();
		$pm->Subject = "Your New EmailBackUs Account";
		$pm->Body = getRegisterMail($user);
		$pm->AddAddress($user["email"]);

		return $pm->Send();
	}

	function mailLogin($user) {
		$pm = getMailer();
		$pm->Subject = "Access Your EmailBackUs Account";
		$pm->Body = getLoginMail($user);
		$pm->AddAddress($user["email"]);

		return $pm->Send();
	}

	function mailForm($user, $params) {
		if (empty($params) || !$user["active"]) {
			return NULL;
		}

		$pm = getMailer();
		$pm->Subject = "New Form Submission";
		$pm->Body = getFormMail($params);
		$pm->AddAddress($user["email"]);

		return $pm->Send();
	}

	function getRegisterMail($user) {
		return 
sprintf("Welcome to EmailBackUs!  You can access your account with the link below:

http://emailback.us/account.php?accessToken=%s

If you can't click it, copy/paste it into your browser.  This link will give you access to your account settings for the next day.  If you received this email in error, please disregard it.

Thanks,
EmailBackUs
http://emailback.us
",
$user["accessToken"]);
	}

	function getLoginMail($user) {
		return 
sprintf("Welcome back to EmailBackUs!  You can access your account with the link below:

http://emailback.us/account.php?accessToken=%s

If you can't click it, copy/paste it into your browser.  This link will give you access to your account settings for the next day.  If you received this email in error, please disregard it.

Thanks,
EmailBackUs
http://emailback.us
",
$user["accessToken"]);
	}

	function getFormMail($params) {
		$body = "";
		if (array_key_exists('HTTP_REFERER', $_SERVER)) {
			$body = $body . "Form submitted from: " . $_SERVER['HTTP_REFERER'] . "\n\n";
		}
		foreach ($params as $key => $val) {
			$body = $body . $key . ":\n";
			$body = $body . $val . "\n\n";
		}
		return $body;
	}

?>