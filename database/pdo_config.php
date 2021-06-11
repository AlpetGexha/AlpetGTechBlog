<?php

$username = 'root';
$password = '';
$pdo_db = new PDO('mysql:host=localhost;dbname=alpetgtech', $username, $password );


if (!$pdo_db) {
    die('Nuk u lidh me PDO database');
}
?>