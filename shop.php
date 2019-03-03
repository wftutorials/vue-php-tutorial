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

    <title>Vue &amp; PHP - Shopping Cart</title>

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
                    <a class="nav-link active" href="shop.php">Shopping Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Check List</a>
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
            <h1 class="display-3">My Shopping Cart</h1>
            <p class="lead">{{ itemsCount }} Items</p>
            <p>
            <form action="submit.php?action=shop" method="get" style="display: inline-block;">
                <input name="products" type="hidden" v-model="products">
                <a href="javascript:void(0);" id="show-modal" @click="showModal = true" class="btn btn-primary">View Cart</a>
                <button class="btn btn-lg btn-success" role="button">Submit Cart</button>
            </form>
            <a @click="clearProducts()" class="btn btn-lg btn-danger" href="javascript:void(0);" role="button">Clear Cart</a>
            </p>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Shopping Items
            </div>
            <div class="card-block">
                <ul class="list-group">
                    <li  v-for="item in items" :key="item.id" class="list-group-item clearfix">
                        <div class="" style="width:100%; display: inline-block;">
                            {{ item.name }} <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right" @click="addToCart(item.id)">Add Item</a>
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
    <modal v-if="showModal" @close="showModal = false" v-bind:items="cardIds">
</div> <!-- /container -->
<!-- template for the modal component -->
<script type="text/x-template" id="modal-template">
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">

                    <div class="modal-header">
                        <slot name="header">
                            Items in my cart
                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot name="body">
                           <ul>
                               <li  v-for="item in items" :key="item.id">{{ products[item]["name"] }}</li>
                           </ul>
                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer">
                            <button class="modal-default-button" @click="$emit('close')">
                                OK
                            </button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</script>

<script>
    Vue.component('modal', {
        template: '#modal-template',
        props: ['items'],
        data: function() {
            return {
                "products" : <?php echo get_shop_items();?>
            }
        }
    });

    var myObject = new Vue({
        el: '#app',
        data : {
            showModal: false,
            itemsCount : 0,
            products: "",
            cardIds: [],
            "items": <?php echo get_shop_items();?>
        },
        methods: {
            addToCart( id ) {
                console.log(id)
                this.itemsCount++;
                this.cardIds.push(id);
                this.updateProducts(id);
            },
            updateProducts( id ){
                this.products = this.cardIds.toString();
            },
            clearProducts(){
                this.products = "";
                this.itemsCount = 0;
                this.cardIds = [];
            }
        }
    })
</script>
</body>
</html>

