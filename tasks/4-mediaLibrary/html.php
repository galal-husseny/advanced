
<?php 
// relative path from server super global;
$imagesPath = ($_SERVER["REQUEST_SCHEME"].'://'.$_SERVER['SERVER_NAME']."/php/advanced/tasks/4-mediaLibrary/images");
$folderPath = $_SERVER["REQUEST_SCHEME"].'://'.$_SERVER['SERVER_NAME']."/".$_SERVER['REQUEST_URI'];
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
                            $image = "$imagesPath/php.png";
                        }elseif(pathinfo($value)['extension'] == 'txt'){
                            $image = "$imagesPath/file.png";
                        }else{
                            $image = "$imagesPath/default.png";
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
                                <img class="card-img-top" src="<?= $imagesPath ?>/folder.png" alt="" >
                                <div class="card-body">
                                    <h4 class="card-title"><a href="<?= $folderPath . $value ?>"><?= $value ?></a></h4>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>

                </div>
            </div>

            <div class="col-4 mt-5">
                <form method="post">
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
            <div class="col-4  mt-5">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="media">Upload Media</label>
                        <!-- Html input array -->
                        <input type="file" name="media[]" id="media" multiple class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary rounded" name="media"> Create File </button>
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