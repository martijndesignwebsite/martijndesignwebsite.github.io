<?php
session_start();  // Start de sessie voor tokenvalidatie

// Tokenvalidatie
if (empty($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    echo '<span class="notice">Error! Ongeldige token. Probeer het formulier opnieuw in te dienen.</span>';
    exit;
}

// Validatie en sanering van de POST-gegevens
$name = isset($_POST['Naam']) ? htmlspecialchars(trim($_POST['Naam'])) : '';
$from = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
$phone = isset($_POST['telefoon']) ? htmlspecialchars(trim($_POST['telefoon'])) : '';
$subject = isset($_POST['Onderwerp']) ? htmlspecialchars(trim($_POST['Onderwerp'])) : 'Geen onderwerp';
$message = isset($_POST['bericht']) ? htmlspecialchars(trim($_POST['bericht'])) : '';

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
$headers = "From: Contact Form <noreply@mett-u.be>\r\n";  // Vast "From"-adres
$headers .= "Reply-To: $from\r\n";  // Zorgt ervoor dat bij een reply, de gebruiker als ontvanger wordt ingesteld
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// E-mailinhoud opbouwen
$body = "
    Hoi METT-U beheerder!<br /><br />
    <strong>" . ucfirst($name) . "</strong> heeft je een bericht gestuurd via de website.<br /><br />
    <strong>Naam:</strong> " . ucfirst($name) . "<br />
    <strong>Email:</strong> " . $from . "<br />
    <strong>Telefoon:</strong> " . $phone . "<br />
    <strong>Onderwerp:</strong> " . $subject . "<br />
    <strong>Bericht:</strong><br /><br />
    " . nl2br($message) . "<br /><br />
    ============================================================
";

// E-mailadres van de ontvanger
$to = 'contact@mett-u.be';  // Pas dit aan naar je eigen e-mailadres

// Verzenden van de e-mail
if (mail($to, $subject, $body, $headers)) {
    echo '<div class="success"><h3>Bedankt!</h3>Je bericht is succesvol verzonden.</div>';
} else {
    echo '<div>Er is een fout opgetreden bij het verzenden van je bericht. Probeer het later opnieuw.</div>';
}

// Token ongeldig maken na gebruik (CSRF-token moet eenmalig gebruikt worden)
unset($_SESSION['token']);
?>