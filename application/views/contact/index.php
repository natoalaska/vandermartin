<h2>Account Settings</h2>
<table>
<tr>
<td>
<!-- Change Password -->
<?php if($error != '') echo '<div class="error"><p class="clearfix">' . $error . '</p></div>';?>
<?=form_open('contact/send', 'class="form"')?>
<p class="clearfix">
	<h3>Contact Us</h3>
</p>
<p class="clearfix">
	<?=form_label('Subject', 'subject')?>
	<?=form_input('subject','', 'id=subject placeholder=Subject')?>
</p>
<p class="clearfix">
	<?=form_label('Message', 'message')?>
	<?=form_textarea('message','', 'id=message placeholder=Message')?>
</p>
<?=form_hidden('type',$type)?>
<?=form_hidden('receiver','1')?>
<p class="clearfix">
	<?=form_submit('submit', 'Submit')?>
</p>
<?=form_close()?>
</td>
</tr>
</table>