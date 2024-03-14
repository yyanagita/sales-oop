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
<div class="row justify-content-center">
    <div class="row mt-2 mb-3">
        <div class="col text-start ps-2 text-decoration-none"><a href="login.php"><i class="fa-solid fa-house"></i></a></div>
        <div class="col text-end text-danger pe-2"><i class="fa-solid fa-user-xmark"></i></div>
    </div>
    <div class="div w-25 mx-auto">
        <div class="h2 text-warning mb-3 mt-5 text-center fw-bold"><i class="fa-solid fa-pen-to-square"></i>Edit Product</div>

        <?php
            session_start();
            $product_data = $_SESSION['product_data'];
        ?>
        <form action="actions/updateproduct.php" method="POST">
            <input type="hidden" name="id" value="<?=$product_data['id']?>">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" name ="productName" id ="productName" class="form-control" value="<?= $product_data['product_name'] ?>" required>

            <div class="row">
                <div class="col-6">
                    <label for="price" class="form-label">Price</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                        </div>
                        <input type="text" name= "price" id = "price" class="form-control" value="<?= $product_data['price'] ?>" required>
                    </div>
        
                </div>
                <div class="col-6">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" name= "quantity" id = "quantity" class="form-control" value="<?= $product_data['quantity'] ?>"required>
                </div>
            </div>
            <button type = "submit" name ="edit"  class = "btn btn-warning mt-3 w-100">Edit</button>
        </form>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>