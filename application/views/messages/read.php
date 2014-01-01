<div id="message">
	<a href="<?=base_url()?>messages/delete/<?=$message['uid']?>">Delete</a>
	<a href="<?=base_url()?>messages/replay/<?=$message['uid']?>">Reply</a>
	<table>
		<tr>
			<td>
				<b>From:</b><br />
				<b>Subject:</b><br />
				<b>Sent:</b><br />
				<b>Read:</b><br />
				<b>Type:</b><br />
				<b>Message:</b><br />
			</td>
			<td>
				<?=$message['senderName']?><br />
				<?=$message['subject']?><br />
				<?=date_format($message['sendDT'], 'm/d/Y @ H:i:s')?><br />
				<?=date_format($message['readDT'], 'm/d/Y @ H:i:s')?><br />
				<?=$message['type']?><br />
				<?=$message['message']?>
			</td>
		</tr>
	</table>
</div>