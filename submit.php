<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 3/3/19
 * Time: 7:40 AM
 *
 */
include 'functions.php';


if( isset($_GET["products"]) && !empty($_GET["products"]) ){
    $ids = explode(',', $_GET["products"]);
    $products = shop_items();
    foreach( $ids as $id ){
        echo $products[$id]["name"]. "<br>";
    }
}

if(isset($_GET["todos"]) && !empty($_GET["todos"])){
    $data = json_decode($_GET["todos"]);
    var_dump($data);
}