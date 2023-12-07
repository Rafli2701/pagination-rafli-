<?php
//get files and folders inside a folder
$folder_name = $_GET["path"];
$arrFiles = scandir($folder_name);
$dir = array(); //contains list of folders
$files = array(); //contains list of files
for ($i = 0; $i < count($arrFiles); $i++) {
    if ($arrFiles[$i] != "." && $arrFiles[$i] != "..") {
        $realpath = $folder_name . "/" . $arrFiles[$i];
        if (is_dir($realpath)) {
            array_push($dir, $arrFiles[$i]);
        } else {
            array_push($files, $arrFiles[$i]);
        }
    }
}
echo json_encode(array("dir" => $dir, "file" => $files));
