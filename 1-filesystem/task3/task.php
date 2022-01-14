<?php

$randomDirectory = scandir('randomData');
array_shift($randomDirectory);
array_shift($randomDirectory);
$files = [];
$folders = [];
foreach ($randomDirectory as $index => $value) {
    $path = __DIR__ . DIRECTORY_SEPARATOR . 'randomData'.DIRECTORY_SEPARATOR . $value;
    if(is_dir($path)){
        array_push($folders,$value);
    }else{
        array_push($files,$value);
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="alert alert-success" role="alert">
          Files
        <ul>
            <?php foreach ($files as $key => $value) {
                echo "<li>$value</li>";
            } ?>
            
        </ul>
      </div>
      <div class="alert alert-success" role="alert">
          Folders
        <ul>
        <?php foreach ($folders as $key => $value) {
                echo "<li>$value</li>";
            } ?>
        </ul>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

