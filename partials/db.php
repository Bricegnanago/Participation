<?php

$dsn = 'mysql:dbname=participation;host=127.0.0.1';
$username = "root";
$password = "";
$dbname = "participation";
try {
    $db = new PDO($dsn, $username, $password);
  } catch (PDOException $e) {
      echo 'Connexion échouée : ' . $e->getMessage();
    }
?>