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

// function upload
if (!isset($_SESSION['user_id'])) {
    header('location: index.php');
    exit();
}

if (isset($_POST['upload'])) {
    $user_id = $_SESSION['user_id'];
    $filename = $db->real_escape_string($_FILES['file']['name']);
    $tmp_name = $_FILES['file']['tmp_name'];
    $file_path = 'uploads/' . $filename;

    if (move_uploaded_file($tmp_name, $file_path)) {
        $query = "INSERT INTO files (user_id, filename, file_path) VALUES ('$user_id', '$filename', '$file_path')";
        if ($db->query($query)) {
            echo "File berhasil diunggah dan dimasukkan ke dalam database.";
            header('location: tabel_data.php');
        } else {
            echo "Gagal memasukkan data file ke database.";
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}

// fungsi Download
if (isset($_POST['file'])) {
    $file_paths = explode(',', $_POST['file']); // Memisahkan nilai berdasarkan koma
    $zipname = 'downloaded_files.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);

    foreach ($file_paths as $file_path) {
        if (file_exists($file_path)) {
            $zip->addFile($file_path, basename($file_path));
        }
    }

    $zip->close();

    // Mengatur header untuk file zip
    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename=' . $zipname);
    header('Content-Length: ' . filesize($zipname));
    readfile($zipname);

    // Menghapus file zip setelah di-download
    unlink($zipname);
    exit;
} else {
    echo 'File tidak valid.';
}


// fungsi delete
if (isset($_POST['files'])) {
    $file_paths = explode(',', $_POST['files']); // Memisahkan nilai berdasarkan koma

    foreach ($file_paths as $file_path) {
        // Hapus file fisik dari direktori "uploads"
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Hapus data file dari database
        $user_id = $_SESSION['user_id'];
        $delete_query = "DELETE FROM files WHERE file_path = '$file_path' AND user_id = '$user_id'";
        $db->query($delete_query);
    }

    // Redirect ke halaman daftar file setelah menghapus
    header('location: tabel_data.php');
} else {
    echo 'File tidak valid.';
}
