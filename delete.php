<?php
session_start();
require('db.php');

// Fungsi delete
if (isset($_POST['files'])) {
    $deletedFiles = [];
    $files = $_POST['files'];

    foreach ($files as $file_path) {
        // Hapus file fisik dari direktori "uploads"
        if (file_exists($file_path)) {
            if (is_dir($file_path)) {
                // Jika itu adalah direktori, gunakan fungsi delete_directory
                delete_directory($file_path);
            } else {
                unlink($file_path);
            }
            $deletedFiles[] = $file_path;
        }
    }

    // Hapus data file dari database
    $user_id = $_SESSION['user_id'];
    $inClause = "'" . implode("', '", $deletedFiles) . "'";
    $delete_query = "DELETE FROM files WHERE file_path IN ($inClause) AND user_id = '$user_id'";

    if ($db->query($delete_query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database error']);
    }
}

// Fungsi delete_directory
function delete_directory($dir)
{
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!delete_directory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }

    return rmdir($dir);
}
?>



<?php
// session_start();

// require('db.php');

// // fungsi delete
// if (isset($_POST['files'])) {
//     echo "masuk sini bro";
//     $file_path = $_POST['files'];

//     // Hapus file fisik dari direktori "uploads"
//     if (file_exists($file_path)) {
//         unlink($file_path);
//     }

//     // Hapus data file dari database
//     $user_id = $_SESSION['user_id'];
//     $delete_query = "DELETE FROM files WHERE file_path = '$file_path' AND user_id = '$user_id'";
//     $db->query($delete_query);
//     header('location: tabel_data.php'); // Redirect ke halaman daftar file setelah menghapus
// }
