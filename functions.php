<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 3/3/19
 * Time: 7:29 AM
 */

function get_home_page_data(){
    $data  = [
        "message" =>"Vue and PHP ",
        "test" => ""
    ];
    return json_encode($data);
}

function shop_items(){
    $data = include "db_shop.php";
    return $data;
}

function get_shop_items(){
    $data = shop_items();
    return json_encode($data);
}

function get_todos(){
    $data = include "db_todos.php";
    return json_encode($data);
}