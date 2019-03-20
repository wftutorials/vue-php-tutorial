<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 3/3/19
 * Time: 5:53 AM
 */
include "./functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Narrow Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/narrow-jumbotron.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.21/dist/vue.js"></script>
</head>
<style>

</style>

<body>

<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">
                <li class="nav-item">
                    <a class="nav-link active" href="table.php">Quantity Table</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Vue Quantity Table</h3>
    </div>

    <div class="jumbotron">
        <h1 class="display-3">Vue Quantity Table</h1>
        <p class="lead">A wizard built using php and vue.js</p>
    </div>

    <div class="container">
        <div class="wizard"  id="app">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"># Quantity</th>
                    <th scope="col">Item</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="row in rows">
                    <th><input type="number" v-model="row.quantity"></th>
                    <td>{{ row.item }} </td>
                    <td>{{ row.price }}</td>
                    <td>{{ row.quantity * row.price }}</td>
                </tr>
                <tr>
                    <th colspan="3">Total</th>
                    <td >
                        {{ total }}
                    </td>
                </tr>
                </tbody>
            </table>
            <hr>
            <button type="button" @click="test()" class="btn btn-primary">Submit this data</button>
            <br><br>
        </div>

    </div>

    <footer class="footer">
        <p>&copy; Company 2017</p>
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
            rows : {
                1 : {
                    'quantity' : 0,
                    'price' : 3.00,
                    'total' : 0,
                    'item' : "HB Pencil"
                },
                2 : {
                    'quantity' : 0,
                    'price' : 3.00,
                    'total' : 0,
                    'item' : "Manilla Envelope"
                },
                3 : {
                    'quantity' : 0,
                    'price' : 150.00,
                    'total' : 0,
                    'item' : "Cross Black Ink Pen"
                },
                4 : {
                    'quantity' : 0,
                    'price' : 10.00,
                    'total' : 0,
                    'item' : "Paper Clips"
                },
            }
        },
        methods : {
            test : function(){
                var total=this.rows[1];
                console.log(total.total);
            }
        },
        computed : {
            total : function(){
                var total = 0;
                for(var i =1; i <= Object.keys(this.rows).length; i++){
                    total += this.rows[i].price * this.rows[i].quantity;
                }
                return total;
            }
        }

    })
</script>
</body>
</html>

