<?php

ob_start();


$server_name = 'localhost';
$user_name = 'root';
$password = '';
$database = 'barcode-soft';

$conn = mysqli_connect($server_name, $user_name, $password , $database);
