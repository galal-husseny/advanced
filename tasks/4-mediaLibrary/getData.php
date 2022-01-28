<?php
$data = scandir($folder);
$files = [];
$folders = [];

foreach ($data as $index => $value) {

    if($value !== '.' && $value !== '..'){
        $path = $folder . DIRECTORY_SEPARATOR . $value;
        if (is_dir($path)) {
            array_push($folders, $value);
        } else {
            array_push($files, $value);
        }
    }
    
}
