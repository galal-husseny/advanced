<?php
ob_start();
include "header.php";
$header = ob_get_clean();

include "content.php"; // dashboarrd
$content = ob_get_clean();


echo str_replace('{{title}}',$content,$header);

