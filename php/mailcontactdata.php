<?php 
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$msg = $_POST['msg'];

	$to = "aesharmanzar@gmail.com";
	$sub = "Visitor Contacted you from your A2Z Interior Website";
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
							<td align='center' width='100%' style='font-size: 18px;padding-top: 10px;'><span style='color: #555;'><b>$name</b></span> contacted you through contact section of your <b>A2Z Interior</b> website.</td>
						</tr>
						<tr>
							<td align='center' style='font-size: 22px;padding: 10px 0px 10px 0px;'>More Details</td>
						</tr>
					</table>
					<!-- Content2 -->
					<table style='background-color: #fff' width='100%' cellpadding='0' cellspacing='0' border='0'>
						<tr>
							<td align='right' width='30%'><b><span style='color: #555;font-size: 18px;'>Name</span><span style='width: 34px;display: inline-block;'></span></b></td>
							<td align='center'>$name</td>
						</tr>
						<tr>
							<td align='right'><span style='color: #555;font-size: 18px;'><b>Email</b></span><span style='width: 33px;display: inline-block;'></span></td>
							<td align='center'>$email</td>
						</tr>
						<tr>
							<td align='right'><span style='color: #555;font-size: 18px;'><b>Mobile Number</b></span><span style='width: 33px;display: inline-block;'></span></td>
							<td align='center'>$phone</td>
						</tr>
						<tr>
							<td align='right'><span style='color: #555;font-size: 18px;'><b>Message</b></span><span style='width: 9px;display: inline-block;'></span></td>
							<td></td>
						</tr>
					</table>
					<!-- Content Message  -->
					<table style='background-color: #fff' cellpadding='0' cellspacing='0' width='100%'>
						<tr>
							<td style='padding-left: 30%;'>$msg</td>
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

?>