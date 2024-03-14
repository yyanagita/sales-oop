<?php
include '../classes/products.php';

$Products = new Products;

$Products->create($_POST);