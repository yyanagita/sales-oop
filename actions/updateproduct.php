<?php
include '../classes/products.php';

$Products = new Products;

$Products->updateproduct($_POST);