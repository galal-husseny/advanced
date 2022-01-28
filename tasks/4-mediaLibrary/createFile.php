<?php
// create file
if (isset($_POST['file'])) {
    $file =   $_POST['name'] . "." . $_POST['extension'];
    $path = $folder . DIRECTORY_SEPARATOR ;
    $content = $_POST['data'];
    file_put_contents($path.$file, $content);
}