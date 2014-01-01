<div class="form">
	<h1>Register</h1>
	<fieldset>
		<legend>Personal Information</legend>
		<?php
		echo form_open('login/createMember');
		echo form_input('firstName', set_value('firstName'),'placeholder="First Name"');
		echo form_input('lastName', set_value('lastName'),'placeholder="Last Name"');
		echo form_input('email', set_value('email'),'placeholder="Email Address"');
		?>
	</fieldset>
	<fieldset>
		<legend>Login Informaiton</legend>
		<?php
		echo form_input('username', set_value('username'),'placeholder="Username"');
		echo form_password('password', '','placeholder="Password"');
		echo form_password('password2', '','placeholder="Confirm Password"');
		?>
	</fieldset>
		<?php 
		echo form_submit('submit', 'Create Account');
		echo validation_errors('<p class="error">');
		echo form_close();
		?>
		
</div>