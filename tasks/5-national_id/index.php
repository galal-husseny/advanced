<?php
session_start();
// print_r($_SESSION);die;
?>
<!doctype html>
<html lang="en">

<head>
    <title>Welcome</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="contianer">
        <div class="row mt-5">
            <div class="col-12 h1 text-center text-dark">
                National ID
            </div>
            <div class="col-4 offset-4 mt-5 mr-5">
                <form action="getMyData.php" method="post">
                    <div class="form-group">
                        <label for="national_id">National Id</label>
                        <input type="number" name="national_id" id="national_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-dark form-control">Get My Data</button>
                    </div>
                </form>
            </div>
            <div class="col-4 offset-4">
                <?php if (isset($_SESSION['response'])) {
                    if (isset($_SESSION['response']['success'])) { ?>
                        <ul>
                            <li>
                                Birthdate:<b class="text-success font-weight-bold"><?= $_SESSION['response']['success']['birthdate'] ?></b>
                            </li>
                            <li>
                                City:<b class="text-success font-weight-bold"><?= $_SESSION['response']['success']['city'] ?></b>
                            </li>
                            <li>
                                Gender:<b class="text-success font-weight-bold"><?= $_SESSION['response']['success']['gender'] ?></b>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <ul>
                            <li class="alert alert-danger">
                                Error:<b class="font-weight-bold"><?= $_SESSION['response']['error'][0] ?></b>
                            </li>
                        </ul>
                <?php  }
                } ?>
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
<?php 
unset($_SESSION['response']);
?>