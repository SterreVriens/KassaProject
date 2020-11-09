<?php
require("config.php");

if (!isset($_SESSION['id'])){
    exit('Unauthorized user! Please Log in');
}

$file = '../download/kassa.exe';

if(!file_exists($file)){ // file does not exist
    die('file not found');
} else {
    //header("Cache-Control: must-revalidate, post-check=0, pre-check=0")
    header("Content-Description: File Transfer");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=kassa.exe");
    header("Content-Transfer-Encoding: binary");
    header('Content-Length: ' . filesize($file));    
    // read the file from disk
    readfile($file);
}
?>