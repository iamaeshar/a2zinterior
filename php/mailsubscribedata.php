<?php 
	include 'dbconnect.php';
	$email = $_POST['email'];
	
	$sql = "INSERT INTO subscriber (subs_email,subscribed_on,subscribed_at) VALUES('$email',NOW(),NOW())";
	if ($conn->query($sql)) {

		$to = "aesharmanzar@gmail.com";
		$sub = "Visitor Subscribed you from your A2Z Interior Website";
		
		$mailmsg = "
			<!-- Container -->
			<table cellspacing='0' cellpadding='0' border='0' width='95%' style='background-color: #eee;padding: 10px;line-height: 1.8em;margin: 0 auto;'>
				<tr>
					<td>
						<!-- Header -->
						<table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color: rgba(63,176,172,0.8);color: #fff'>
							<tr>
								<td style='padding: 20px 0px 20px 0px;font-size: 24px;' align='center'><b>A2Z Interior</b></td>
							</tr>
						</table>
						<!-- Content -->
						<table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color: #fff'>
							<tr>
								<td align='center' width='100%' style='font-size: 18px;padding-top: 10px;'><span style='color: #555;'><b>$email</b></span> subscribed you through subscribed section of your <b>A2Z Interior</b> website.</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		";
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		if (mail($to,$sub,$mailmsg,$headers)) {
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
	}else{
		echo json_encode(false);
	}
?>