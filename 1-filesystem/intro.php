<?php
//  echo DIRECTORY_SEPARATOR; 
// var_dump(file_exists("2.png"));
// $file = 'test'.DIRECTORY_SEPARATOR.'2.png'; // relative path
$file = 'C:\xampp\htdocs\php\advanced\1-filesystem\test\2.png'; // absolute path
if(file_exists($file)){ // check on file or directory
    echo "file exists";
}else{
    echo "file not exists";
}

// echo __DIR__;
// echo __FILE__;