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
                    <a class="nav-link active" href="todo.php">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form.php">Multi Form</a>
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
                <label for="exampleInputEmail1">Add a New Task</label><br>
                <input style="width: 80%;" v-model="message" v-on:keyup.enter="addToDo()" type="text"
                       placeholder="Enter a task">
                <button @click="addToDo()" style="display:inline-block;" class="btn btn-primary">Save</button>
            </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 style="display: inline-block;">Items</h3>
                <div class="float-right" style="display: inline-block;">
                    &nbsp;<a v-bind:style="{display:showElement}" @click="saveTasks()" href="javascript:void(0)" class="btn btn-sm btn-success">Save Changes</a>&nbsp;
                    <a v-bind:style="{display:invertedDisplay}" @click="editTasks()" href="javascript:void(0)" class="btn btn-sm btn-primary">Edit Items</a>
                    <form action="submit.php" method="get" style="display: inline-block">
                        <input type="hidden" v-model="updatedToDos" name="todos">
                        <button v-if="stale" v-bind:style="{display:invertedDisplay}" class="btn btn-sm btn-primary">Submit Changes</button>
                    </form>
                </div>
            </div>
            <div class="card-block">
                <ul class="list-group">
                    <li v-for="item in items" class="list-group-item ">
                        <div class="" style="width:100%;">
                            <span v-bind:style="{display:invertedDisplay}">{{ item.item }}</span>
                            <input type="text" v-bind:style="{display:showElement}" v-model="item.item" style="width: 100%"/>
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
            showElement: "none",
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
            },
            convertToString(){
                this.updatedToDos = JSON.stringify(this.items);
                this.stale = true;
            },
            editTasks(){
                this.showElement = "inline-block";
            },
            saveTasks(){
                this.convertToString();
                this.showElement ="none";
            }
        },
        computed: {
            // a computed getter
            invertedDisplay: function () {
                // `this` points to the vm instance
                if( this.showElement == "none"){
                    return "inline-block";
                }
                return "none";
            },
        }
    })
</script>
</body>
</html>

