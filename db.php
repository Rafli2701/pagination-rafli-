<?php
$host = 'localhost';
$dbname = 'mywebapp';
$username = 'root';
$password = '';
$file = 'files';
// $delete = 'file_path';

$db = new mysqli($host, $username, $password, $dbname);

if ($db->connect_error) {
    die("Koneksi database gagal: " . $db->connect_error);
}
