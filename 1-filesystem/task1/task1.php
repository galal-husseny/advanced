<?php 
/*

1 check if dir is exists or not
2 if not make directory
3 save it to variable
4 create two files inside this directory
5 assign this files to variables
6 change tha mode of one file to be read only
7 check if files is writable
8 if writable put some code
9 include this file

*/

$dir = "test";

if(!file_exists($dir)){
    mkdir($dir);
    $firstfile = $dir .DIRECTORY_SEPARATOR. "index.txt";
    file_put_contents($firstfile,"hello from first file");
    $secondfile = $dir . DIRECTORY_SEPARATOR . "profile.php";
    file_put_contents($secondfile," <?php echo 'hello world'; ?> ");
    chmod($firstfile,0444);
    if(is_writable($firstfile)){
        file_put_contents($firstfile,"this file isn't readonly",FILE_APPEND);
        include $firstfile;
    }

    if(is_writable($secondfile)){
        file_put_contents($secondfile,"<h1> this file isn't readonly </h1>",FILE_APPEND);
        include $secondfile;
    }
}
