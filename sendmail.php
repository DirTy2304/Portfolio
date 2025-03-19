<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST["nom"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $sujet = htmlspecialchars($_POST["sujet"]);
    $message = nl2br(htmlspecialchars($_POST["message"]));

    // Adresse email où tu veux recevoir les messages
    $destinataire = "hugo.lambert2304@gmail.com";

    // Sujet de l'email
    $objet = "Nouveau message de $nom - $sujet";

    // Contenu de l'email
    $contenu = "
    <html>
    <head>
      <title>$sujet</title>
    </head>
    <body>
      <p><strong>Nom :</strong> $nom</p>
      <p><strong>Email :</strong> $email</p>
      <p><strong>Message :</strong></p>
      <p>$message</p>
    </body>
    </html>
    ";

    // Headers de l'email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    // Envoi de l'email
    if (mail($destinataire, $objet, $contenu, $headers)) {
        echo "<script>alert('Message envoyé avec succès !'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Erreur lors de l'envoi du message.'); window.location.href='index.html';</script>";
    }
} else {
    echo "<script>alert('Accès refusé.'); window.location.href='index.html';</script>";
}
?>
