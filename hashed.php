<?php
$password = "123456789"; // Ton mot de passe
$hash = password_hash($password, PASSWORD_DEFAULT);
echo "Mot de passe haché : " . $hash . PHP_EOL;
?>