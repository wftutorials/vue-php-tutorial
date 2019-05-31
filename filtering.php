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

    <title>Filtering a table with vue</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/narrow-jumbotron.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.21/dist/vue.js"></script>
</head>
<style>

</style>

<body>

<div class="container"  id="app">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">
                <li class="nav-item">
                    <a class="nav-link active" href="table.php">Filter Table</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Vue Quantity Table</h3>
    </div>

    <div class="jumbotron">
        <h1 class="display-3">Filter a Table</h1>
        <p class="lead">Filtering a table with vue.js</p>
        <input type="text" v-model="query" placeholder="Search"/>
        <button @click="search()" >Search</button>
    </div>

    <div class="container">
        <div class="wizard">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="row in rows">
                    <td>{{ row.name }} </td>
                    <td>{{ row.email }}</td>
                    <td><span class="badge badge-default">{{ row.type }}</span></td>
                    <td>{{ row.status }}</td>
                </tr>
                </tbody>
            </table>
            <hr>
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
            query: "",
            originalrows :[],
            rows : [
                {
                    'id' : 1,
                    'name' : 'Wynton Franlin',
                    'email' : 'wf@gmail.com',
                    'type' : 'Member',
                    'status' : 'Active',
                },
                {
                    'id' : 2,
                    'name' : 'James Barkel',
                    'email' : 'jamesbarkely@gmail.com',
                    'type' : 'Member',
                    'status' : 'Active',
                },
                {
                    'id' : 3,
                    'name' : 'Tommy Gun',
                    'email' : 'Tg@gmail.com',
                    'type' : 'Admin',
                    'status' : 'InActive',
                },
                {
                    'id' : 4,
                    'name' : 'Mary Gates',
                    'email' : 'mg@gmail.com',
                    'type' : 'Member',
                    'status' : 'Active',
                },
            ]
        },
        beforeMount(){
            this.originalrows = this.rows;
        },
        methods : {
            search() {
                var results = [];
                var searchData = this.originalrows;
                if(this.query == ""){
                    this.rows = this.originalrows;
                }else{
                    for (var i=0 ; i < searchData.length ; i++)
                    {
                        var sparam = this.query.toLowerCase();
                        for (var key in searchData[i]) {
                            if (searchData[i].hasOwnProperty(key)) {
                                console.log(searchData[i][key]);
                                var value = searchData[i][key];
                                if(typeof value =="string" && value.toLowerCase().indexOf(sparam) >=0){
                                    results.push(searchData[i]);
                               }
                            }
                        }
                    }
                    this.rows = results;
                }
                console.log(results);
            }
        },
        watch : {
            query () {
                this.search();
            }
        }
    })
</script>
</body>
</html>

