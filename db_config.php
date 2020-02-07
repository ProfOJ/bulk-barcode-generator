<?php

ob_start();
session_start();

$server_name = '209.222.109.226';
$user_name = 'liteneeds_admin';
$password = 'orogneiL@55';
$database = 'liteneeds_barcode_soft';

$conn = mysqli_connect($server_name, $user_name, $password , $database);
