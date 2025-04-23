<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
  $mail->isSMTP();
  $mail->Host       = 'smtp.strato.de';
  $mail->SMTPAuth   = true;
  $mail->Username   = 'dein-email@deine-domain.de';
  $mail->Password   = 'DEIN_PASSWORT';
  $mail->SMTPSecure = 'tls';
  $mail->Port       = 587;

  $mail->setFrom('dein-email@deine-domain.de', 'Gemeinsam Fit Kontaktformular');
  $mail->addAddress('dein-email@deine-domain.de');

  $mail->isHTML(false);
  $mail->Subject = 'Neue Nachricht von Gemeinsam Fit';

  $body = "Name: " . $_POST['firstname'] . " " . $_POST['lastname'] . "\n"
        . "Telefon: " . $_POST['phone'] . "\n"
        . "E-Mail: " . $_POST['email'] . "\n"
        . "Adresse: " . $_POST['street'] . ", " . $_POST['zip'] . " " . $_POST['city'] . "\n\n"
        . "Nachricht:\n" . $_POST['message'];

  $mail->Body = $body;

  $mail->send();
  $message = "Vielen Dank! Ihre Nachricht wurde erfolgreich gesendet.";
} catch (Exception $e) {
  $message = "Fehler beim Senden: " . $mail->ErrorInfo;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Gemeinsam Fit – Rückmeldung</title>
  <meta http-equiv="refresh" content="5; URL=https://gemeinsamfit.com">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #fdfaf6;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .popup {
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.1);
      text-align: center;
      max-width: 400px;
    }
    .popup h1 {
      font-size: 1.5rem;
      color: #1e5030;
    }
    .popup p {
      margin-top: 1rem;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="popup">
    <h1>Nachricht versendet</h1>
    <p><?php echo htmlspecialchars($message); ?></p>
    <p>Du wirst in wenigen Sekunden zur Startseite weitergeleitet...</p>
  </div>
</body>
</html>
