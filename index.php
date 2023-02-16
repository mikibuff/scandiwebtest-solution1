<?php
include 'class_type.php';
$class_type = new Class_type();
$insert = $class_type->insert();
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
              <!-- Add New product Form -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 padding">
                        <form action="" method="POST" id="product_form" enctype="multipart/form-data">
                       <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 style="float:left;padding:5px;">Add Product</h1>
                         <!-- Save and Cancel buttons -->
                        <div style="float:right; padding:15px;">
                         <button type="submit" name="submit" class="btn btn-space btn-primary">Save</button>
                         <button type="reset" onclick="history.back()" class="btn btn-space btn-secondary">Cancel</button>
                        </div>
                       </div>
                      </div>
                <hr style="height: 1px;color: black;background-color: black;">
                            <div class="card-body">
                                <!-- sku input -->
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <label for="sku">SKU</label>
                                        <input type="text" class="form-control" id="sku_db" name="sku_db" hidden>
                                        <input type="text" class="form-control" id="sku" name="sku" placeholder="Please, submit required data." required>
                                    </div>
                                </div>
                                <!-- name input -->
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Please, submit required data." required>
                                    </div>
                                </div> 
                                <!-- price input -->
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12 ">
                                        <label for="price">Price ($)</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Please, submit required data." required >
                                    </div>
                                </div> 
                                <!-- product type select -->
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12 ">
                                        <label for="productType">Type Switcher</label>
                                        <select id='productType' name="productType" required class="form-control">
                                            <option value="">Choose type of Product</option>
                                            <option value="1">DVD</option>
                                            <option value="2">Book </option>
                                            <option value="3">Furniture</option>
                                        </select>
                                        <br>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-4 col-md-12 col-sm-12 ">
                                        <!-- DVD input -->
                                        <div id="dvddisk">
                                            <div class="form-group">
                                                <label class="control-label" for="size">Size:</label>
                                                <input class="form-control" id="size" name="size" type="text" placeholder="Please, provide size">
                                                <p>“Please provide size in MB format”, when type: DVD is selected.</p>
                                            </div>
                                        </div>
                                        <!-- Book input -->
                                        <div id="book">
                                            <div class="form-group">
                                            <label class="control-label" for="weight">Weight</label>
                                                <input class="form-control" id="weight" name="weight" type="text" placeholder="Please, provide weight">
                                            <p>“Please provide size in KG format”, when type: BOOK is selected.</p>
                                            </div>
                                        </div>
                                        <!-- Furniture input -->
                                        <div id="furniture">
                                            <div class="form-group">
                                        <label for="dimensions">HeightxWidthxLength (CM)</label>
                                        <input class="form-control" type="text" name='dimensions' id='dimensions' placeholder='Please, provide dimensions'>
                                            <p>“Please provide dimensions”, when type: Furniture is selected.</p>
                                           </div>
                                       </div> 
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function ($) {
        $("#dvddisk").hide();
        $("#book").hide();
        $("#furniture").hide();
        $('#productType').on('change', function () {
            switch ($("#productType").val()) {
                case "1":
                    $("#book").hide();
                    $("#furniture").hide();
                    $("#dvddisk").show();
                    break;
                case "2":
                    $("#book").show();
                    $("#dvddisk").hide();
                    $("#furniture").hide();
                    break;
                case "3":
                    $("#furniture").show();
                    $("#dvddisk").hide();
                    $("#book").hide();
                    break;

                default:
                    break;
            }
        });

    });
</script>