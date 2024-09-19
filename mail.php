<?php
// Tokenvalidatie
if (empty($_POST['token']) || $_POST['token'] != 'FsWga4&@f6aw') {
    echo '<span class="notice">Error! Ongeldig token.</span>';
    exit;
}

// Validatie en sanering van de POST-gegevens
$name = isset($_POST['Naam']) ? htmlspecialchars(trim($_POST['Naam'])) : '';
$from = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
$phone = isset($_POST['telefoon']) ? htmlspecialchars(trim($_POST['telefoon'])) : '';
$subject = isset($_POST['Onderwerp']) ? stripslashes(nl2br(htmlspecialchars(trim($_POST['Onderwerp'])))) : '';
$message = isset($_POST['bericht']) ? stripslashes(nl2br(htmlspecialchars(trim($_POST['bericht'])))) : '';

// Controleer of de verplichte velden zijn ingevuld
if (empty($name) || empty($from) || empty($message)) {
    echo '<span class="notice">Error! Vul alle verplichte velden in.</span>';
    exit;
}

// E-mail validatie
if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
    echo '<span class="notice">Ongeldig e-mailadres!</span>';
    exit;
}

// E-mail headers instellen
$headers = "From: Form Contact <$from>\r\n";
$headers .= "Reply-To: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// E-mailinhoud opbouwen
ob_start();
?>
Hoi METT-U beheerder!<br /><br />
<strong><?php echo ucfirst($name); ?></strong> heeft je een bericht geschreven via de website.
<br /><br />
<strong>Naam:</strong> <?php echo ucfirst($name); ?><br />
<strong>Email:</strong> <?php echo $from; ?><br />
<strong>Telefoon:</strong> <?php echo $phone; ?><br />
<strong>Onderwerp:</strong> <?php echo $subject; ?><br />
<strong>Bericht:</strong><br /><br />
<?php echo $message; ?>
<br /><br />
============================================================
<?php
$body = ob_get_contents();
ob_end_clean();

// E-mailadres van de ontvanger
$to = 'contact@mett-u.be';  // Pas dit aan naar je eigen e-mailadres

// Verzenden van de e-mail
if (mail($to, $subject, $body, $headers)) {
    echo '<div class="success"><i class="fas fa-check-circle"></i><h3>Bedankt</h3>Je bericht is succesvol verstuurd.</div>';
} else {
    echo '<div>Er is een fout opgetreden bij het verzenden van je bericht. Probeer het later opnieuw.</div>';
}

?>