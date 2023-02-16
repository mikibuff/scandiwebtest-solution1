<?php

require_once ('product.php');
require_once ('interface.php');

Class Class_type extends Product implements Product_Interface {

    public function __construct() {

        $res = $this->dbConnect();
    }
    //display products//
    public function getList() {

        $query = "SELECT * FROM products ORDER BY id desc";
        $res = $this->getResultSetArray($query);

        return $res;
    }
    //add new product//
    public function insert() {

        if (isset($_POST['submit'])) {

                $sku = $_POST['sku'];
                $name = $_POST['name'];
                $dimensions = $_POST['dimensions'];
                $size = $_POST['size'];
                $weight = $_POST['weight'];
                $productType = $_POST['productType'];
                $price = $_POST['price'];

                $query = "INSERT INTO products (sku,name,dimensions,size,weight,productType,price) VALUES ('$sku','$name','$dimensions','$size','$weight','$productType','$price')";
                if ($sql = $this->conn->query($query)) {

                    echo "<script>window.location.href = 'products.php';</script>";
                }
        }
    }
}

 

class Book extends Product implements Product_description_interface {

    private $weight;

    public function product_desc() {
        return $this->weight;
        
    }

}

class Dvd extends Product implements Product_description_interface {

    private $size;

    public function product_desc() {
        return $this->size;
    }

}

class Furniture extends Product implements Product_description_interface {

    private $dimensions;

    public function product_desc() {
        return $this->dimensions;
    }

}
