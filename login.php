<?php
session_start();

require('db.php');

if (isset($_POST['login'])) {
    $username = $db->real_escape_string($_POST['username']);
    $password = $db->real_escape_string($_POST['password']);

    $query = "SELECT id, username, password FROM users WHERE username = '$username'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Periksa apakah password cocok dalam bentuk teks biasa (tidak di-hash)
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            // $_SESSION['username'] = $user['username'];
            header('Location: tabel_data.php');
            exit();
        } else {
            echo "Login gagal. Periksa username dan password Anda.";
        }
    } else {
        echo "Login gagal. Periksa kembali username dan password Anda.";
    }
}
