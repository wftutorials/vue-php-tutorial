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
        .modal-mask {
            position: fixed;
            z-index: 9998;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .5);
            display: table;
            transition: opacity .3s ease;
        }

        .modal-wrapper {
            display: table-cell;
            vertical-align: middle;
        }

        .modal-container {
            width: 500px;
            margin: 0px auto;
            padding: 20px 30px;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
            transition: all .3s ease;
            font-family: Helvetica, Arial, sans-serif;
        }

        .modal-header h3 {
            margin-top: 0;
            color: #42b983;
        }

        .modal-body {
            margin: 20px 0;
        }

        .modal-default-button {
            float: right;
        }

        /*
         * The following styles are auto-applied to elements with
         * transition="modal" when their visibility is toggled
         * by Vue.js.
         *
         * You can easily play with the modal transition by editing
         * these styles.
         */

        .modal-enter {
            opacity: 0;
        }

        .modal-leave-active {
            opacity: 0;
        }

        .modal-enter .modal-container,
        .modal-leave-active .modal-container {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
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
                    <a class="nav-link active" href="todo.php">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Multi Form</a>
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
            <h1 class="display-3">My ToDo List</h1>
        </div>
    </div>
    <div class="container">
            <div class="form-group">
                <label for="exampleInputEmail1">Add Item</label>
                <input v-model="message" v-on:keyup.enter="addToDo()" type="text" class="form-control"
                       placeholder="Enter a task">
            </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Items
                <div class="float-right">
                    <form action="submit.php" method="get">
                        <input type="hidden" v-model="updatedToDos" name="todos">
                        <button v-if="stale" class="btn btn-sm btn-primary">Save Updated List</button>
                    </form>
                </div>
            </div>
            <div class="card-block">
                <ul class="list-group">
                    <li v-for="item in items" class="list-group-item ">
                        <div class="" style="width:100%;">
                            {{ item.item }}
                            <div class="float-right">
                                &nbsp;<a href="javascript:void(0)" class="btn btn-sm btn-primary">Edit Item</a>&nbsp;
                                <a href="javascript:void(0)" class="btn btn-sm btn-danger float-right">Delete Item</a>
                            </div>
                        </div>
                    </li>
                </ul>
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
            updatedToDos : "",
            stale: false,
            items: <?php echo get_todos();?>,
        },
        methods: {
            addToDo() {
                this.addToItems(this.message);
                this.message = "";
            },
            addToItems(message){
                var count = Object.keys(this.items).length;
                this.items[count +1 ] = {
                    'id' : "nan",
                    "item":message,
                };
                this.convertToString();
                this.stale = true;
            },
            convertToString(){
                this.updatedToDos = JSON.stringify(this.items);
            }
        }
    })
</script>
</body>
</html>

