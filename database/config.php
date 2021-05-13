<?php 
 $servername = 'localhost';
 $username = 'root';
 $password = '';
 $database = 'alpetgtech';
 $db = mysqli_connect($servername,$username,$password,$database);
 //php include('config.php');
if (!$db) {
    die('Nuk u lidh me database');
}
