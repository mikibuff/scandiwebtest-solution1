<?php
include 'class_type.php';
include 'mass-delete.php';
$class_type = new Class_type();
$allProducts = 0;
$res = $class_type->getList($allProducts);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Miki Arsov">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Product App - Miki</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />
        <link rel="stylesheet" type="text/css" href="style.css" />

        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
    </head>
    <body>
           <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://scandiwebproductphp.000webhostapp.com/">ADD PRODUCT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://scandiwebproductphp.000webhostapp.com/products.php">PRODUCT LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://careers.scandiweb.com/jobs/2124223-web-developer">ABOUT</a>
                    </li>
                </ul>
            </div>
        </nav>
              <!-- Get all the products from the database and display them -->
            <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
             <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 style="float:left;padding:5px;">Products List</h1>
                        <div style="float:right;padding:10px;">
                <form action="" method="POST">
                  <a href="index.php" class="btn btn-primary">ADD</a>
                <button type="submit" name='delete_multiple_btn' class="btn btn-danger">MASS DELETE</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row text-center" >    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                              <?php
                            if (isset($res['productList'])) {
                                foreach ($res['productList'] as $result) {
                                                ?>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                            <div class="product-thumbnail">
                                                <div class="product-content">  
                                                    <div class="product-content-head">
                                                            <label class="delete-checkbox">
                                                                <input type="checkbox" name="delete_id[]" value="<?= $result['id']; ?>"></label><br>
                                                        <h4 class="sku"><?= $result['sku']; ?></h4>
                                                        <h4 class="name"><?= $result['name']; ?></h4>
                                                        <h5 class="price"><?= $result['price']; ?> $</h5>
                                                        <div class="size"><?= $result ['size'] ?  "Size: " . $result ['size'] . "MB" : '';?></div>
                                                        <div class="weight"><?= $result ['weight'] ?  "Weight: " . $result ['weight'] . "KG" : '';?></div>
                                                        <div class="dimensions"><?= $result ['dimensions']  ?  "Dimensions: " . $result ['dimensions'] . "" : '';?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php } 
                              } ?>
                        </div>
                    </div>
                   </div>
                </form>
            </div>
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
