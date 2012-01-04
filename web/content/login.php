<?php if (isset($user)) { ?>		
			<div id="logged_in" class="section">
				<span class="login_email"><?php echo $user["email"]; ?></span>
				<a href="logout.php" class="btn" style="float:right">Logout</a>
				<a href="account.php" class="btn primary" style="float:right; margin-right: 10px">Account</a>
			</div>
<?php } else { ?>
			<div id="login" class="section">
				<form action="login.php" method="POST">
					<div>
						<input name="email" class="large_input" size="40"/>
						<button type="submit" class="btn large primary">Start</button>
					</div>
					<label class="login_subtitle" for="email">Enter your email to set up your free account or log in</label>
				</form>
			</div>
<?php }	?>