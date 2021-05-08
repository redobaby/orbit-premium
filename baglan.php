<?php

try {
  $vt= new PDO("mysql:host=localhost;dbname=guukgang_db;charset=utf8","guukgang_db","OsRotCCqo4Kc");
} catch (PDOException $e) {
  echo $e->getMessage();
}

date_default_timezone_set('Europe/Istanbul');
session_start();
?>
