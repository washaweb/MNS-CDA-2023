<?php

$dsn = 'mysql:host=localhost;dbname=test';
$pdo = new PDO($dsn, 'root', '1234');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);