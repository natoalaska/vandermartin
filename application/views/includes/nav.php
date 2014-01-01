<?php
$m = new Message();
$m->where('receiver',$this->session->userdata('id'));
$m->where('read','0');
$m->get();
if($m->result_count() > 0) {
	$numMessages = '<div id="messages">' . $m->result_count() . '</div>';
	$message = 'class="message"';
} else {
	$numMessages = '';
	$message = '';
}
?>

<div id="nav">
	<ul class="menu">
		<li>
			<ul class="left">
				<li><a href="<?=base_url()?>home">Home</a></li>
				<li>
					<a href="<?=base_url()?>contact">Contact Us</a>
					<ul>
						<li><a href="<?=base_url()?>contact/index/suggestion">Suggestions</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<ul class="right">
				<li>
					<a href="#" <?=$message?>><?=$this->session->userdata('user')?></a>
					<ul>
						<li><a href="<?=base_url()?>account/settings">Settings</a></li>
						<li>
							<a href="<?=base_url()?>messages">Messages <?=$numMessages?></a>
							<ul>
								<li><a href="<?=base_url()?>messages/send">Send</a></li>
							</ul>
						</li>
						<li><a href="<?=base_url()?>auth/logout">Logout</a></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
</div>