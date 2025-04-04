<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $message = htmlspecialchars($_POST["message"]);
  $antispam = trim($_POST["antispam"]);

  if ($antispam !== "5") {
    echo "Spam koruması başarısız.";
    exit;
  }

  $to = "info@kuleyzen.com";
  $subject = "Yeni İletişim Formu Mesajı";
  $headers = "From: $email\r\n";
  $body = "Ad: $name\nE-posta: $email\nMesaj:\n$message";

  mail($to, $subject, $body, $headers);
  header("Location: tesekkurler.html");
  exit;
}
?>
