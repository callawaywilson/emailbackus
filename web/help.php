<?php
	require("lib/store.php");
	include("lib/auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>EmailBackUs - Help</title>
	<link rel="stylesheet" href="css/screen.css" type="text/css"/>
	<link media="handheld, screen and (max-device-width: 640px)" href="css/mobile.css" type="text/css" rel="stylesheet" />
	<meta name="description" content="EmailBackUs Help &amp; FAQ" />
	<meta name="keywords" content="email form processor web homepage agile back-end faq help question" />

	<link href="css/prettify.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="js/prettify.js"></script>

	<?php include("content/analytics.php"); ?>

</head>

<body onload="prettyPrint()">

	<?php include("content/header.php"); ?>

	<div id="page">
		<div id="top">
			<?php include("content/login.php"); ?>
		</div>

		<div id="content">
			<div class="content_section">
				<h2>Frequently Asked Questions</h2>
				<ul style="list-style:none;padding-left:10px">
					<li><a href="#form">How do I add a form to my site?</a></li>
					<li><a href="#account_access">How do I access my account?</a></li>
					<li><a href="#settings">What settings are in my account?</a></li>
					<li><a href="#form200">How do I create a form submitted page?</a></li>
					<li><a href="#limits">How many forms can I have?</a></li>
					<li><a href="#different_email">How do I use another email address?</a></li>
					<li><a href="#privacy">Do you keep the forms sent?</a></li>
				</ul>
				<p>Have a question not answered here?  Use our <a href="contact.php">contact page</a> or email us at <a href="mailto:help@emailback.us">help@emailback.us</a>.</p>
			</div>
			<div class="content_section">
				<h2 id="form">How do I add a form to my site?</h2>
				<p>To use EmailBackUs, you need to do three things on your form:</p>
				<ul>
					<li><b>Set the action to http://emailback.us/submit.php</b> - Set the "action" field of your form to our form processor URL.</li>
					<li><b>Set the method to POST</b> - Set the "method" field of your form to HTTP POST.</li>
					<li><b>Set a hidden apiKey field</b> - Create an input of type "hidden", name "apiKey" and value your API Key.</li>
				</ul>
				<h3>Example Form:</h3>
				<pre class="prettyprint code">&lt;form action="http://emailback.us/submit.php" method="POST"&gt;
    &lt;input name="apiKey" type="hidden" value="YOUR-API-KEY"/&gt;
    &lt;label for="email"&gt;Your Email&lt;/label&gt;
    &lt;input name="email"/&gt;
    &lt;label for="subject"&gt;Subject&lt;/label&gt;
    &lt;input name="subject"/&gt;
    &lt;label for="message"&gt;Message&lt;/label&gt;
    &lt;input name="message"/&gt;
    &lt;input type="submit" value="Send Message"/&gt;
&lt;/form&gt;</pre>
				<p>If you're logged in, you can see a working example form for your email by clicking the "sample form" link at the bottom of your account page.</p>
			</div>
			<div class="content_section">
				<h2 id="account_access">How do I access my account?</h2>
				<p>If you've already signed up, just enter your email address above.  You'll get an email with a link to your account page.  No passwords to remember and you'll be able to access your account from the link for a day.</p>
			</div>
			<div class="content_section">
				<h2 id="settings">What settings are in my account?</h2>
				<p>You can change all your settings from your account page:</p>
				<ul>
					<li><b>Email</b> - The email address that you receive form submissions.  This email address cannot be changed.  If you want to change it, deactivate your old account and create a new one at the address you want to change to.</li>
					<li><b>API Key</b> - The key that you must include on form submissions to have them processed.  Simply include it in a hidden input named "apiKey".</li>
					<li><b>Success URL</b> - The page on your site that is displayed after a successful form submission.  If this URL is omitted, a simple thank you page will be displayed on emailback.us with a link back to the form.</li>
					<li><b>Error URL</b> - If an error occurs sending the form email, this page will be displayed on your site.  You can include alternate contact information or an error message.  If omitted, a page on emailback.us will be displayed with a link back to the form.</li>
					<li><b>Active</b> - On/Off switch for your account.  If off, emails will not be sent and all users will be directed to the error page.
				</ul>
			</div>
			<div class="content_section">
				<h2 id="form200">How do I create a form submitted page?</h2>
				<p>You can create a custom landing page for users who submitted the form to be directed to.  Simply put the page on your site that you wish people to see after they submit the form and enter its link the <b>Success URL</b> on your account page.</p>
				<p>If you wish users to see a page when an error occurs (site outage, account disabled, etc.), you can enter its link as the <b>Error URL</b> on your account page.</p>
			</div>
			<div class="content_section">
				<h2 id="limits">How many forms can I have?</h2>
				<p>You can have as many forms as you want on as many sites as you want, and they can have any kind of non-file content you want.  The form emailer will send you all the fields of the form in the order they are on the page.  Keep in mind that this is a free service and it remaining free depends on it not being abused.</p>
			</div>
			<div class="content_section">
				<h2 id="different_email">How do I use another email address?</h2>
				<p>Simply register another account with your new email address.  You'll still have access to your old account as long as you have access to your old email address.</p>
			</div>
			<div class="content_section">
				<h2 id="privacy">Do you keep the forms sent?</h2>
				<p>Nope!  Once it's been emailed, your form information disappears.  The only thing we keep track of is the time and type of web requests to our servers for security and auditing purposes.</p>
			</div>
		</div>

	</div>

	<?php include("content/footer.php"); ?>

</html>
