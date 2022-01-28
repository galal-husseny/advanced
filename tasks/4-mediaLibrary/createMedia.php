<?php
define('fileTypes', ['image','video']);
$path = $folder . DIRECTORY_SEPARATOR; // data/
if(isset($_POST['media'])){
    // print_r($_FILES);die;
    $imagesCount = count($_FILES['media']['name']);
    for ($i=0; $i < $imagesCount; $i++) { 
        $fileType = explode('/',$_FILES['media']['type'][$i])[0];
        $extension = explode('/',$_FILES['media']['type'][$i])[1];
        if(!in_array($fileType,fileTypes)){
            // error
        }
        if(!file_exists($path.$fileType)){
            mkdir($path.$fileType); // data/image , data/video
        }
        $filename = uniqid(); 
        $newFile = $filename . '.' . $extension;
        $newImagePath = $path.$fileType . DIRECTORY_SEPARATOR . $newFile;
        move_uploaded_file($_FILES['media']['tmp_name'][$i],$newImagePath);
    }
}
