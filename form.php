<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 3/3/19
 * Time: 5:53 AM
 */
include "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Vue &amp; PHP - ToDo List</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/narrow-jumbotron.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.21/dist/vue.js"></script>
    <style>
        .hide-element{
            display: none;
        }
    </style>
</head>

<body>

<div class="container" id="app">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shopping Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="todo.php">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="form.php">Multi Form</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">API</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Vue and PHP</h3>
    </div>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-3">A Multi-Form</h1>
            <p>An events attendance form</p>
        </div>
    </div>

    <div class="container">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Your Name</label>
                <input type="text" class="form-control" placeholder="Enter your full name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Your Email</label>
                <input type="email" class="form-control" placeholder="Enter your email">
            </div>
            <button type="button" class="btn btn-success">Add Attendee</button>
            <button type="button" class="btn btn-danger">Remove Attendee</button>
            <form action="submit.php" method="get" style="display: inline-block">
                <input type="hidden" v-model="updatedToDos" name="todos">
                <button class="btn btn-primary">Submit Changes</button>
            </form>
        </form>
        <br>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 style="display: inline-block;">Attendee</h3>
                <div class="float-right" style="display: inline-block;">
                </div>
            </div>
            <div class="card-block">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>

    <footer class="footer">
        <p>&copy; igestDevelopment 2019</p>
    </footer>
</div> <!-- /container -->
<script>

    var myObject = new Vue({
        el: '#app',
        data : {
            message: "",
            items: "",
        },
        methods: {

        },
        computed: {
            // a computed getter
        }
    })
</script>
</body>
</html>

