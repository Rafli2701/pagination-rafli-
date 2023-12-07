<?php
// Menerima data dari permintaan POST
$folderName = $_POST["folderName"];
$path = $_POST["path"];

// Validasi
if (empty($folderName) || empty($path)) {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
    exit;
}

// Lokasi lengkap folder
$fullPath = $path . "/" . $folderName;

// Periksa apakah folder sudah ada
if (file_exists($fullPath)) {
    echo json_encode(["success" => false, "message" => "Folder already exists"]);
    exit;
}

// Coba membuat folder baru
if (!file_exists($folderName) && mkdir($fullPath, 0700)) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to create folder"]);
}
