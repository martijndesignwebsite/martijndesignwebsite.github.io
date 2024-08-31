<?php
	
	if( empty( $_POST['token'] ) ){
		echo '<span class="notice">Error!</span>';
		exit;
	}
	if( $_POST['token'] != '402d29a4-692d-485a-a7c5-d101f008eb1e' ){
		echo '<span class="notice">Error!</span>';
		exit;
	}
	
	$name = $_POST['name'];
	$from = $_POST['email'];
	$phone = $_POST['phone'];
	$subject = stripslashes( nl2br( $_POST['subject'] ) );
	$message = stripslashes( nl2br( $_POST['message'] ) );
	
	$headers ="From: Form Contact <$from>\n";
	$headers.="MIME-Version: 1.0\n";
	$headers.="Content-type: text/html; charset=iso 8859-1";
	
	ob_start();
	?>
		Hoi METT-U beheerder!<br /><br />
		<?php echo ucfirst( $name ); ?>  heeft je een bericht geschreven via de website.
		<br /><br />
		
		Name: <?php echo ucfirst( $name ); ?><br />
		Email: <?php echo $from; ?><br />
		Phone: <?php echo $phone; ?><br />
		Subject: <?php echo $subject; ?><br />
		Message: <br /><br />
		<?php echo $message; ?>
		<br />
		<br />
		============================================================
	<?php
	$body = ob_get_contents();
	ob_end_clean();
	
	$to = 'contact@mett-u.be';

	$s = mail($to,$subject,$body,$headers,"-t -i -f $from");

	if( $s == 1 ){
		echo '<div class="success"><i class="fas fa-check-circle"></i><h3>Bedankt</h3>Je bericht is succesvol aangekomen.</div>';
	}else{
		echo '<div>Er is een fout opgetreden.</div>';
	}

	
?>
