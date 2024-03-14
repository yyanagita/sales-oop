
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buy</title>

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
        <div class="h2 text-success mb-3 text-center fw-bold"><i class="fa-solid fa-pen-to-square"></i>Buy Product</div>

        <?php
            session_start();
            $product_data = $_SESSION['product_data'];
        ?>
        <form action="actions/decideQuantity.php" method="POST">
            <input type="hidden" name="id" value="<?=$product_data['id']?>">
            <label for="productName" class="form-label">Product Name</label>
            <div class="h2"><?= $product_data['product_name'] ?></div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="price" class="form-label">Price</label>
                    <div class="h2">$ <?= $product_data['price'] ?></div>
        
                </div>
                <div class="col-6">
                <input type="hidden" name="stocknum" value="<?=$product_data['quantity']?>">
                    <label for="stocknum" class="form-label">Stocks Left</label>
                    <div class="h2"><?= $product_data['quantity'] ?></div>
                </div>
            </div>
            <label for="quantity" class="form-label">Buy Quantity</label>
            <input type="number" name= "buy-quantity" id = "buy-quantity" class="form-control w-50 mx-auto" required>

            <?php if(isset($_POST['btn-compute'])){ ?>
                <div class="h6 text-danger">maximun of <?= $product_data['quantity'] ?></div>
            <?php } ?>
            <button type = "submit" name ="pay" id='pay' class = "btn btn-success mt-3 w-100">Pay</button>
        </form>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>