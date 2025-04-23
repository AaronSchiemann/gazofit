<?php
$to = "kontakt@gemeinsamfit.de";
$subject = "Neue Kontaktanfrage von Gemeinsam Fit";

$firstname = htmlspecialchars($_POST['firstname']);
$lastname  = htmlspecialchars($_POST['lastname']);
$phone     = htmlspecialchars($_POST['phone']);
$email     = htmlspecialchars($_POST['email']);
$street    = htmlspecialchars($_POST['street']);
$zip       = htmlspecialchars($_POST['zip']);
$city      = htmlspecialchars($_POST['city']);
$message   = htmlspecialchars($_POST['message']);

$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$body = "Neue Kontaktanfrage:\n\n"
      . "Name: $firstname $lastname\n"
      . "Telefon: $phone\n"
      . "E-Mail: $email\n"
      . "Adresse: $street, $zip $city\n\n"
      . "Nachricht:\n$message";

if (mail($to, $subject, $body, $headers)) {
    echo "Vielen Dank für Ihre Nachricht.";
} else {
    echo "Leider gab es ein Problem beim Versenden.";
}
?>
