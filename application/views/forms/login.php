<!DOCTYPE html>
<html>
<head>
	<title>Vander Martin - Login</title>
	<link rel="stylesheet" type="css/text" href="<?=base_url()?>css/login.css" />
</head>
<body>
	<?php if($error != '') echo '<div class="error"><p class="clearfix">' . $error . '</p></div>';?>
	
	<?=form_open('auth/login','class="form"')?>
		<p class="clearfix">
			<?=form_label('Email','email')?>
			<?=form_input('email',set_value('email'), 'id=email placeholder=Email')?>
		</p>
		<p class="clearfix">
			<?=form_label('Password','password')?>
			<?=form_password('password','', 'id=password placeholder=Password')?>
		</p>
		<p class="clearfix">
			<?=form_label('<a href="auth/forgot">Forgot&nbsp;Password?</a>')?>
		</p>
		<p class="clearfix">
			<?=form_submit('login','Login');?>
		</p>
	<?=form_close()?>
</body>
</html>
