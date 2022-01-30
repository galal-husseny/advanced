<?php
include_once "database/product.php";
if (isset($_POST['enter'])) {
    $table = "<table class='table'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>";
                for ($i = 0; $i < $_POST['products_count']; $i++) {
                    $table .= "
                        <tr>
                            <td><input type='text' class='form-control' name='products[$i][name]' ></td>
                            <td><input type='number' class='form-control' name='products[$i][price]' ></td>
                            <td><input type='number' class='form-control' name='products[$i][quantity]' ></td>
                        </tr>";
                }
                $table .= "</tbody>
            </table>
    <div class='form-group'>
        <button class='btn btn-primary' name='save'> Save products </button>
    </div>";
}

if (isset($_POST['save'])) {
    $product = new product;
    foreach ($_POST['products'] as $index => $pro) {
        $product->create($pro);
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-success">
                    Products
                </h1>
            </div>
            <div class="col-6 offset-3">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="number">Number Of Products</label>
                        <input type="number" name="products_count" id="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" name='enter'> Enter </button>
                    </div>

                    <?= isset($table) ? $table : '' ?>
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