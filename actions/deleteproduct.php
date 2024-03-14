<?php
include '../classes/products.php';

$Product = new Products;

$Product->delete($_POST);