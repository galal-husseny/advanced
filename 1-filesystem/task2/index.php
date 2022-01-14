<?php


if (isset($_POST['dir'])) {
    // create dir
    $dir = "data" . DIRECTORY_SEPARATOR . $_POST['name'];
    mkdir($dir);
}

if (isset($_POST['file'])) {
    // create file
    // print_r($_POST);
    $file = "data" . DIRECTORY_SEPARATOR . $_POST['name'] . "." . $_POST['extension'];
    $content = $_POST['data'];
    file_put_contents($file, $content);
}

$data = scandir(__DIR__ . DIRECTORY_SEPARATOR . 'data');
$files = [];
$folders = [];

foreach ($data as $index => $value) {

    if($value !== '.' && $value !== '..'){
        $path = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $value;
        if (is_dir($path)) {
            array_push($folders, $value);
        } else {
            array_push($files, $value);
        }
    }
    
}
// print_r($files);
// print_r(pathinfo("galal.php"));
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
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-dark h1 mt-5">
                <h1>Library</h1>
                <div class="row">
                    <?php foreach ($files as $key => $value) {
                        if(pathinfo($value)['extension'] == 'php'){
                            $image = "images/php.png";
                        }elseif(pathinfo($value)['extension'] == 'txt'){
                            $image = "images/file.png";
                        }else{
                            $image = "images/default.png";
                        }
                    ?>
                        <div class="col-2">
                            <div class="card text-left">
                              <img class="card-img-top" src="<?php echo $image ?>" alt="">
                              <div class="card-body">
                                <h4 class="card-title"><?= $value ?></h4>
                              </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                    <?php foreach ($folders as $key => $value) {
                        
                    ?>
                     <div class="col-2">
                            <div class="card text-left">
                                <img class="card-img-top" src="images/folder.png" alt="" >
                                <div class="card-body">
                                    <h4 class="card-title"><a href="data/<?= $value ?>"><?= $value ?></a></h4>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>

                </div>
            </div>

            <div class="col-4 offset-2 mt-5">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Directory Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark rounded" name="dir"> Create Directory </button>
                    </div>
                </form>
            </div>

            <div class="col-4  mt-5">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">File Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="extension">File Type</label>
                        <select name="extension" class="form-control" id="extension">
                            <option value="txt">Text</option>
                            <option value="php">PHP</option>
                            <option value="docx">Word</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="data">Data</label>
                        <textarea name="data" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary rounded" name="file"> Create File </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>