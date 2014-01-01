<div id="message">
	<table>
		<tr>
			<th></th>
			<th>From</th>
			<th>Subject</th>
			<th>Sent</th>
			<th>Type</th>
		</tr>
		<?php
			//print_r($messages);
			//echo count($messages['id']);
			$count = count($messages['id']);
			for($i = 0; $i < $count; $i++) {
				echo '<tr>
						<td><a href="' . base_url() . 'messages/read/' . $messages['uid'][$i] . '">Read</a></td>
						<td>' . $messages['senderName'][$i] . '</td>
						<td>' . $messages['subject'][$i] . '</td>
						<td>' . date_format($messages['sendDT'][$i], 'm/d/Y @ H:i:s') . '</td>
						<td>' . $messages['type'][$i] . '</td>
					</tr>';
			}
		?>
	</table>
</div>