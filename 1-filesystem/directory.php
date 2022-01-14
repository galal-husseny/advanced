<?php
// $dir = "laptop/girst"; // relative path
$dir = __DIR__ . "\laptop\intro"; // absoulte path
// mkdir($dir); 
// rmdir($dir);
// 
// var_dump(is_dir($dir)); // check if folder exists or not 

// echo dirname("C:\\xampp\htdocs\php\\nti\laravel-surevy.zip");
// echo __DIR__;


print_r(scandir(__DIR__.DIRECTORY_SEPARATOR.'empty'));