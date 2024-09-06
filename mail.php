<?php
if (empty($_POST['token'])) {
    echo '<span class="notice">Error!</span>';
    exit;
}
if ($_POST['token'] != 'FsWga4&@f6aw') {  // Zorg ervoor dat dit token overeenkomt met je HTML-formulier
    echo '<span class="notice">Error!</span>';
    exit;
}

$name = $_POST['Naam'];
$from = $_POST['email'];
$phone = $_POST['telefoon'];
$subject = stripslashes(nl2br($_POST['Onderwerp']));
$message = stripslashes(nl2br($_POST['bericht']));

$headers = "From: Form Contact <$from>\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso 8859-1";

ob_start();
?>
Hoi METT-U beheerder!<br /><br />
<?php echo ucfirst($name); ?> heeft je een bericht geschreven via de website.
<br /><br />

Naam: <?php echo ucfirst($name); ?><br />
Email: <?php echo $from; ?><br />
Telefoon: <?php echo $phone; ?><br />
Onderwerp: <?php echo $subject; ?><br />
Bericht: <br /><br />
<?php echo $message; ?>
<br />
<br />
============================================================
<?php
$body = ob_get_contents();
ob_end_clean();

$to = 'contact@mett-u.be';  // Verander dit naar je eigen e-mailadres

$s = mail($to, $subject, $body, $headers);

if ($s == 1) {
    echo '<div class="success"><i class="fas fa-check-circle"></i><h3>Bedankt</h3>Je bericht is succesvol aangekomen.</div>';
} else {
    echo '<div>Er is een fout opgetreden.</div>';
}
?>