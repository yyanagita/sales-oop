<?php
include '../classes/products.php';

$Products = new Products;

$Products->decideQuantity($_POST);