<?php
// create dir
if (isset($_POST['dir'])) {
    
    $dir = $folder . DIRECTORY_SEPARATOR . $_POST['name'];
    mkdir($dir);
    file_put_contents($dir.'\home.php', '<?php $folder = __DIR__;
    $docRoot = $_SERVER["DOCUMENT_ROOT"]."/php/advanced/tasks/4-mediaLibrary";
    include "$docRoot/createFile.php";
    include "$docRoot/createFolder.php";
    include "$docRoot/createMedia.php";
    include "$docRoot/getData.php";
    include "$docRoot/html.php";
    ?>');
}