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
                    <a class="nav-link active" href="wizard.php">Wizard</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Vue Wizard</h3>
    </div>

    <div class="jumbotron">
        <h1 class="display-3">Vue Wizard</h1>
        <p class="lead">A wizard built using php and vue.js</p>
        <p><button @click="start()" class="btn btn-lg btn-success" role="button">Start</button></p>
    </div>

    <div class="container">
        <div class="wizard"  id="app">
            <form method="get" action="submit.php">
            <div class="card">
                <div class="card-header">
                    <h3>Wizard View</h3>
                </div>
                <div class="card-block" style="max-height: 500px;">
                    <!-- form start -->

                        <div v-if="errors.length"
                         style="background-color: indianred; color:white; border: 1px solid #ccc; padding:5px; margin-bottom:5px;">
                        <b>Please correct the following error(s):</b>
                        <ul>
                            <li v-for="error in errors"><span>{{ error }}</span></li>
                        </ul>
                        </div>

                        <span v-if="currentCard == 0">Form is not started as yet</span>

                        <!-- Card one -->
                        <div class="card" v-if="show == 'cardone'" style="height: 350px;">
                            <div class="card-header">
                                <h3>Please enter you contact information</h3>
                            </div>
                            <div class="card-block">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Full Name</label>
                                    <input value="" name="name" v-model="name" type="text" class="form-control" placeholder="e.g. John Doe">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email address</label>
                                    <input name="email" v-model="email" type="email" class="form-control" placeholder="name@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Number</label>
                                    <input name="contact" v-model="contact" type="tel" class="form-control" placeholder="e.g 000-0000">
                                </div>
                            </div>
                        </div>
                        <!-- end card one -->

                        <!-- card Two -->

                        <div class="card" v-if="show == 'cardtwo'" style="height: 350px;">
                            <div class="card-header">
                                <h3>What do you have to say</h3>
                            </div>
                            <div class="card-block">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Post Title</label>
                                    <input  name="postTitle" v-model="postTitle" type="text" class="form-control" placeholder="Enter a post title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Content</label>
                                    <textarea name="postContent" v-model="postContent" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- end card two -->

                        <!-- Card Three -->

                        <div class="card" v-if="show == 'cardthree'" style="height: 350px;">
                            <div class="card-header">
                                <h3>Summary View</h3>
                            </div>
                            <div class="card-block" style="overflow: auto;">
                                Form content added
                                <ul class="list-group">
                                    <li class="list-group-item">Name : {{ name }}</li>
                                    <li class="list-group-item">Email :: {{ email }}</li>
                                    <li class="list-group-item">Contact :: {{ contact }}</li>
                                    <li class="list-group-item">Post Title : {{ postTitle }}</li>
                                    <li class="list-group-item">Details : {{ postContent }}</li>
                                </ul>
                            </div>
                        </div>
                        <!-- end card three -->
                    <input v-model="results" type="hidden" name="wizard">
                </div>
                <div class="card-footer">
                    <button type="button" :disabled="backBtnDisabled == true" @click="backward()" class="btn btn-primary">Back</button>
                    <div class="float-right">
                        <button v-if="currentCard <3" type="button" @click="forward()" class="btn btn-primary">Forward</button>
                        <button v-if="currentCard ==3" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>

    </div>

    <footer class="footer">
        <p>&copy; Company 2017</p>
    </footer>


</div> <!-- /container -->
<script src="./js/wizard-script.js?v=1.1"></script>
</body>
</html>

