<h2>Account Settings</h2>
<table>
<tr>
<td>
<!-- Change Password -->
<?php if($error != '') echo '<div class="error"><p class="clearfix">' . $error . '</p></div>';?>
<?=form_open('account/changePass', 'class="form"')?>
<p class="clearfix">
	<h3>Change Password</h3>
</p>
<p class="clearfix">
	<?=form_label('Old&nbsp;Password', 'oldPass')?>
	<?=form_password('oldPass','', 'id=oldPass placeholder=Old&nbsp;Password')?>
</p>
<p class="clearfix">
	<?=form_label('New&nbsp;Password', 'newPass1')?>
	<?=form_password('newPass1','', 'id=newPass1 placeholder=New&nbsp;Password')?>
</p>
<p class="clearfix">
	<?=form_label('Confirm&nbsp;New&nbsp;Password', 'newPass2')?>
	<?=form_password('newPass2','', 'id=newPass2 placeholder=Confirm&nbsp;New&nbsp;Password')?>
</p>
<p class="clearfix">
	<?=form_submit('changePass', 'Change Password')?>
</p>
<?=form_close()?>
</td>
<td>
<!-- Change Email -->
<?php if($error != '') echo '<div class="error"><p class="clearfix">' . $error . '</p></div>';?>
<?=form_open('account/changeEmail', 'class="form"')?>
<p class="clearfix">
	<h3>Change Email</h3>
</p>
<p class="clearfix">
	<?=form_label('New&nbsp;Email', 'newPass1')?>
	<?=form_password('newEmail1','', 'id=newEmail1 placeholder=New&nbsp;Email')?>
</p>
<p class="clearfix">
	<?=form_label('Confirm&nbsp;New&nbsp;Email', 'newPass2')?>
	<?=form_password('newEmail2','', 'id=newEmail2 placeholder=Confirm&nbsp;New&nbsp;Email')?>
</p>
<p class="clearfix">
	<?=form_submit('changeEmail', 'Change Email')?>
</p>
<?=form_close()?>
</td>
</tr>
</table>