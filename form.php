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
    <form action="form.php" method="get">
    <div class="container">
        <div class="form-group">
            <label for="exampleInputEmail1">Your Name</label>
            <input v-model="name" name="name" type="text" class="form-control" placeholder="Enter your full name">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Your Email</label>
            <input v-model="email" type="email" class="form-control" placeholder="Enter your email">
        </div>
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
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input v-model="aname" type="text" class="form-control" placeholder="Attendee Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input v-model="aemail" type="email" class="form-control"  placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select v-model="status" class="form-control" name="status">
                            <option value="going">Going</option>
                            <option value="not sure">Not Sure</option>
                            <option value="rsvp">RSVP</option>
                        </select>
                    </div>
                    <button @click="addAttendee()" type="button" class="btn btn-success btn-block">Save Attendee</button>
            </div>
        </div>
    </div>
    <br><br>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 style="display: inline-block;">Form Preview</h3>
            </div>
            <div class="card-block">
                <div>
                    Event Participant : {{ name }}<br>
                    Email : {{ email }}<br>
                    Participants : ({{ attendeesCount }})
                </div><br>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Attendee Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="row in attendees">
                        <td>{{ row.name }}</td>
                        <td>{{ row.email }}</td>
                        <td>{{ row.status }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <input type="hidden" v-model="list" name="attendeesList">
        <br>
        <button  type="submit" class="btn btn-primary btn-block">Submit Form</button>
        <br>
    </div>
    </form>
    <footer class="footer">
        <p>&copy; igestDevelopment 2019</p>
    </footer>
</div> <!-- /container -->
<script>

    var myObject = new Vue({
        el: '#app',
        data : {
            name: "",
            email: "",
            status: "",
            aname: "",
            aemail: "",
            items: "",
            attendees: [],
            list : []
        },
        methods: {
            addAttendee() {
                this.attendees.push({
                    "name" : this.aname,
                    "email" : this.aemail,
                    "status" : this.status
                });
                console.log(this.attendees);
                this.aname = "";
                this.aemail = "";
                this.list = JSON.stringify(this.attendees);
            },
        },
        computed: {
            attendeesCount(){
                return this.attendees.length;
            }
        }
    })
</script>
</body>
</html>

