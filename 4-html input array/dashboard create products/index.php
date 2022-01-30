<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Create Products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-dark">
                <h1>Create Products</h1>
            </div>
            <div class="col-12">
                <div id="POItablediv">
                    <form action="controllers/create.php" method="post">
                        <table class="table" id="POITable" border="1">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Delete?</td>
                                    <td>Add Rows?</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><input class="form-control" type="text" name="products[1][name]" id="name" /></td>
                                    <td><input class="form-control" type="text" name="products[1][price]" id="price" /></td>
                                    <td><input class="form-control" type="text" name="products[1][quantity]" id="quantity" /></td>
                                    <td><input type="button" class="btn btn-danger" id="delPOIbutton" value="Delete" onclick="deleteRow(this)" /></td>
                                    <td><input type="button" class="btn btn-success" id="addmorePOIbutton" value="Add More" onclick="insRow()" /></td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary"> Create Products </button>
                    </form>
                    <script>
                        function deleteRow(row) {

                            var i = row.parentNode.parentNode.rowIndex;
                            if (row.parentNode.parentNode.parentNode.rows.length != 1) { // prevent deleting the first element
                                document.getElementById('POITable').deleteRow(i);
                            }
                        }


                        function insRow() {
                            console.log('hi');
                            var x = document.getElementById('POITable');
                            var new_row = x.rows[1].cloneNode(true);
                            var len = x.rows.length;
                            new_row.cells[0].innerHTML = len;

                            var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
                            inp1.name = (inp1.name.replace('[1]', '[' + len + ']'));
                            inp1.id += len;
                            inp1.value = '';
                            var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
                            inp2.name = (inp2.name.replace('[1]', '[' + len + ']'));
                            inp2.id += len;
                            inp2.value = '';
                            var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
                            inp3.name = (inp3.name.replace('[1]', '[' + len + ']'));
                            inp3.id += len;
                            inp3.value = '';
                            x.appendChild(new_row);
                        }
                    </script>
                </div>
            </div>

            <div class="col-12">
                <?php 
                    if(isset($_SESSION['message'])){
                        echo "<div class='alert alert-success text-center'> {$_SESSION['message']} </div>";
                        unset($_SESSION['message']);
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    // DOM
    // EVENTS
    // AJAX => communication between server side and client side (JS)
</body>

</html>