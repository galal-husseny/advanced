<?php
ob_start(); // start output buffering
?>
<h1>Hello</h1>
<?php 
// ob_end_clean(); // end output buffering and clean all data from it
?>
<?php 
// echo ob_get_contents(); // get data from output buffering
?>
<?php 
ob_get_clean(); // get content and clean buffer (ob_get_contents() + ob_end_clean());
?>





<?php 
// ob_end_flush(); // send data and end output buffering
############################################################################################
?>

