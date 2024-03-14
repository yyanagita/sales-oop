<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>



<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="row mt-2 mb-3">
                <div class="col text-start ps-2 text-decoration-none"><a href="login.php"><i class="fa-solid fa-house"></i></a></div>
                <div class="col text-center">Welcome,<?=$_SESSION['uname']?></div>
                <div class="col text-end text-danger pe-2"><i class="fa-solid fa-user-xmark"></i></div>
            </div>
            <div class="col-8">
                <div class="row mb-3">
                    <div class="col d-flex justify-content-between align-items-center">
                        <h2 class="display-6 fw-bold">Product List</h2>
                        <!-- Modal trigger button -->
                        <button type="button" class="btn text-primary px-5 btn-lg px-5" data-bs-toggle="modal" data-bs-target="#openproductModalBtn">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>

                <table class="table">
                    <thead class="table-dark table-sm ">
                        <th>ID</th>
                        <th>PRODUCT_NAME</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php include 'classes/products.php'; ?>
                        
                        <?php 
                        $products = new Products;
                       
                        foreach ($products->displayAllProducts() as $product) { ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= $product['product_name']  ?></td>
                                <td><?= $product['price']  ?></td>
                                <td><?= $product['quantity']  ?></td>
                                <td>
                                    <form action="actions/editproduct.php" method="post" class="d-inline">
                                        <button type="submit" name="btn-update" class="btn btn-warning" value="<?= $product['id'] ?>"><i class="fa-solid fa-pen"></i>
                                        </button>
                                    </form>
                                    <form action="actions/deleteproduct.php" method="post" class="d-inline">
                                        <button type="submit" name="btn-delete" class="btn btn-danger" value="<?= $product['id'] ?>"><i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="actions/buyproduct.php" method="post" class="d-inline">
                                        <?php if($product['quantity']>0){ ?>
                                            <button type="submit" name="btn-buy" class="btn btn-success" value="<?= $product['id'] ?>"><i class="fa-solid fa-cart-shopping "></i>
                                        <?php } ?>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div class="modal fade" id="openproductModalBtn" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="openproductModalBtn" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg mt-3" role="document">
                <div class="modal-content"> 
                <a href="dashbord.php" class="text-end text-secondary h5 m-3"><i class="fa-solid fa-xmark"></i></a>
                    <div class="pb-5 px-5">
                        <h1 class= "text-primary text-center mb-3">
                            <i class="fa-solid fa-box"></i>
                            Add Product
                        </h1>                                   
                        <form action="actions/addproduct.php" method="POST">

                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" name ="productName" id ="productName" class="form-control" required>

                            <div class="row">
                                <div class="col-6">
                                    <label for="price" class="form-label">Price</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">$</div>
                                            
                                        </div>
                                        <input type="text" name= "price" id = "price" class="form-control" required>
                                    </div>
                                    
                                </div>
                                <div class="col-6">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="text" name= "quantity" id = "quantity" class="form-control" required>
                                </div>
                            </div>
                            <button type = "submit" name ="add"  id="openAddProductModalBtn" class = "btn btn-primary mt-3 w-100">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>