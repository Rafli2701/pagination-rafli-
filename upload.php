    <?php
    session_start();

    require('db.php');

    // function upload
    if (isset($_POST['upload'])) {
        $user_id = $_SESSION['user_id'];
        $tipe = $_POST['tipe'];
        $currentFolder = $_POST['current_folder'] == "" ? '/uploads/' : $_POST['current_folder'];

        foreach ($_FILES['file']['name'] as $key => $filename) {
            $tmp_name = $_FILES['file']['tmp_name'][$key];
            $file_path = __DIR__ . '/' . $currentFolder . '/' . $filename;

            if (move_uploaded_file($tmp_name, $file_path)) {
                $query = "INSERT INTO files (user_id, filename, file_path) VALUES ('$user_id', '$filename', '$file_path')";

                if ($db->query($query)) {
                    echo "File berhasil diunggah dan dimasukkan ke dalam database.";
                } else {
                    echo "Gagal memasukkan data file ke database.";
                }
            } else {
                echo "Gagal mengunggah file.";
            }
        }
        // Ambil nama folder dari path
        $folderName = basename($currentFolder);

        // Tentukan URL berdasarkan folder saat ini
        $redirectUrl =  $tipe . '.php' . "?path="  . urlencode($currentFolder);
        echo $redirectUrl;
    }
    header('location: ' . $redirectUrl);
