<?php
	
	if( empty( $_POST['token'] ) ){
		echo '<span class="notice">Error!</span>';
		exit;
	}
	if( $_POST['token'] != '402d29a4-692d-485a-a7c5-d101f008eb1e' ){
		echo '<span class="notice">Error!</span>';
		exit;
	}
	
	$naam = $_POST['naam'];
	$leeftijd = $_POST['leeftijd'];
	$adres = $_POST['adres'];
	$telefoonnummer = $_POST['telefoonnummer'];
	$antwoordvraag1 = stripslashes( nl2br( $_POST['antwoordvraag1'] ) );
	$antwoordvraag2 = stripslashes( nl2br( $_POST['antwoordvraag2'] ) );
	$antwoordvraag3 = stripslashes( nl2br( $_POST['antwoordvraag3'] ) );
	$antwoordvraag4 = stripslashes( nl2br( $_POST['antwoordvraag4'] ) );
	$antwoordvraag5 = stripslashes( nl2br( $_POST['antwoordvraag5'] ) );
	$antwoordvraag6 = stripslashes( nl2br( $_POST['antwoordvraag6'] ) );
	$antwoordvraag7 = stripslashes( nl2br( $_POST['antwoordvraag7'] ) );
	$antwoordvraag8 = stripslashes( nl2br( $_POST['antwoordvraag8'] ) );
	
	$headers ="From: Form Contact <$from>\n";
	$headers.="MIME-Version: 1.0\n";
	$headers.="Content-type: text/html; charset=iso 8859-1";
	
	ob_start();
	?>
		Hoi Mett-u beheerder!<br /><br />
		<?php echo ucfirst( $name ); ?>  heeft je een bericht geschreven via de website.
		<br /><br />
		
		Naam: <?php echo ucfirst( $naam ); ?><br />
		leeftijd: <?php echo $leeftijd; ?><br />
		adres: <?php echo $adres; ?><br />
		telefoonnummer: <?php echo $telefoonnummer; ?><br />
		antwoordvraag1: <br /><br />
		<?php echo $antwoordvraag1; ?>
		<br />
		<br />
		antwoordvraag2: <br /><br />
		<?php echo $antwoordvraag2; ?>
		<br />
		<br />
		antwoordvraag3: <br /><br />
		<?php echo $antwoordvraag3; ?>
		<br />
		<br />
		antwoordvraag4: <br /><br />
		<?php echo $antwoordvraag4; ?>
		<br />
		<br />
		antwoordvraag5: <br /><br />
		<?php echo $antwoordvraag5; ?>
		<br />
		<br />
		antwoordvraag6: <br /><br />
		<?php echo $antwoordvraag6; ?>
		<br />
		<br />
		antwoordvraag7: <br /><br />
		<?php echo $antwoordvraag7; ?>
		<br />
		<br />
		antwoordvraag8: <br /><br />
		<?php echo $antwoordvraag8; ?>
		<br />
		<br />
		============================================================
	<?php
	$body = ob_get_contents();
	ob_end_clean();
	
	$to = 'martijn.vanbrabant20@gmail.com';

	$s = mail($to,$subject,$body,$headers,"-t -i -f $from");

	if( $s == 1 ){
		echo '<div class="success"><i class="fas fa-check-circle"></i><h3>Thank You!</h3>Je bericht is succesvol aangekomen.</div>';
	}else{
		echo '<div>Er is een fout opgetreden.</div>';
	}

	
?>
