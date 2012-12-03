<?php
require_once('../../../../../../wp-load.php');
//error_reporting (E_ALL ^ E_NOTICE);
	
	$emailto = '';
	$messages = '';
	
	if(!empty($_POST))
	{
		$headers = "Content-Type: text/html; charset=\"" . get_option('blog_charset') . "\"\r\n";
		
		if(isset($_POST['subject']))
		{
			$subject = stripslashes($_POST['subject']);
		}
		else
		{
			$subject = stripslashes("[".get_bloginfo('name')."]");
		}
		
		if(isset($_POST['to']))
		{
			$emailto = trim($_POST['to']);	
		}
		else
		{
			$emailto = get_option('admin_email');
		}
		
		if(isset($_POST['th-email-from']))
		{
			$from = trim($_POST['th-email-from']);
			
			$headers .= 'From: ' . $from . "\r\n" .
						'Reply-To: ' . $from . "\r\n" ;
		}
		
		
		foreach ($_POST as $field => $text)
		{
			if(!in_array($field, array('to', 'subject', 'th-email-from')))
			{
				$messages .= "<br><strong>{$field}</strong> : {$text}";
			}
		}
		
		if($emailto)
		{
			$mail = wp_mail($emailto, $subject, $messages, $headers);	

			if($mail) {
				echo 'success';
			}
		}
	}
?>