<?php
$con = mysqli_connect("localhost","id20279561_scandiwebproductphp","[O#fZk&a1i^d+7w9","id20279561_products");

if(isset($_POST['delete_multiple_btn']))
{
    $all_id = $_POST['delete_id'];
    $extract_id = implode(',' , $all_id);

    $query = "DELETE FROM products WHERE id IN($extract_id) ";
    $query_run = mysqli_query($con, $query);
    
    echo "<script>window.location.href = 'products.php';</script>";

}
?>