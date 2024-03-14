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

    <div class="div w-25 mx-auto">
        <div class="h2 text-primary mb-3 mt-5 text-center fw-bold">LOGIN<i class="fa-solid fa-right-to-bracket"></i></div>

        <form action="actions/login.php" method="POST">
            <div class="row mb-2">
                
                <div class="col-md-3  mb-3"><label for="username" class="form-label text-end">Username</label></div>
                <div class="col-md-9  mb-3"><input type="text" name ="uname" id ="uname" class="form-control" placeholder="username" required></div>
                
                <div class="col-md-3"><label for="password" class="form-label" id="password" >Password</label></div>
                <div class="col-md-9"><input type="password" name="password" id="password" class="form-control" placeholder="Password" required ></div>

                <div class="col-md-3"></div>
                <div class="col-md-9"><button type = "submit" name ="regist" class = "btn btn-primary mt-3 w-100">Login</button></div>
                
            </div>
            
            
        </form>

        <form action="regist.php" method="POT">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9 text-center"><button type= "button" id="openRegistrationModalBtn" class = "btn btn-danger px-5">Create Account</button></div>
            </div>
        </form>
    </div>

    <script>
    document.getElementById('openRegistrationModalBtn').addEventListener('click', function() {
        fetch('regist.php')
            .then(response => response.text())
            .then(data => {
                document.body.insertAdjacentHTML('beforeend', data);
                var registrationModal = new bootstrap.Modal(document.getElementById('registrationModal'));
                registrationModal.show();
            });
    });
    </script>

    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>