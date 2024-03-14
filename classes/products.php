<?php
include 'Connection.php';

class Products extends Connection{
    
    public function displayAllProducts(){

        $sql = "SELECT * FROM products";
    
        if($result = $this->conn->query($sql)){
            if($result->num_rows > 0){
                return $result;
            } else {
                echo "<tr>
                    <td colspan='5' class='text-center lead fst-italic fw-bold'>
                        No Records Found
                    </td>
                </tr>";
            }
        } else {
            die("Error: " . $this->conn->error);
        }
    }

    public function create($request){
        $productName = $request['productName'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "INSERT INTO `products`( `product_name`, `price`, `quantity`) 
               VALUES ('$productName','$price',' $quantity')";

        if($this->conn->query($sql)){
            header('location:../dashbord.php');
            exit;
        }else{
            die('ERROR: unable to add product');
        }
    }

    public function editdisplay($request){
        $productId = $request['btn-update'];

        $sql = "SELECT * FROM `products` where id = '$productId'";

        $result = $this->conn->query($sql);
        if($result){
            $product_data = $result->fetch_assoc();

            session_start();
            $_SESSION['product_data'] = $product_data;

            header('location:../editProduct.php');
            exit;
        }else{
            die('ERROR: unable to select product');
        }
    }

    public function updateproduct($request){
        $id = $request['id']; 
        $productName = $request['productName'];
        $price = $request['price'];
        $quantity = $request['quantity'];

            $sql = "UPDATE `products` 
            SET `product_name`='$productName',
            `price`='$price',
            `quantity`='$quantity'
            WHERE `id` = '$id'";

            if($this->conn->query($sql)){
                header('location:../dashbord.php');
                exit;
            }else{
                die('ERROR: unable to update product');
            }
    }

    public function delete($request){
        $productId = $request['btn-delete'];

        $sql = "DELETE FROM `products` WHERE `id` = '$productId'";

        if($this->conn->query($sql)){
            header('location:../dashbord.php');
            exit;
        }else{
            die("ERROR:unable to add user");
        }
    }

    public function buydisplay($request){
        $productId = $request['btn-buy'];

        $sql = "SELECT * FROM `products` where id = '$productId'";

        $result = $this->conn->query($sql);
        if($result){
            $product_data = $result->fetch_assoc();

            session_start();
            $_SESSION['product_data'] = $product_data;

            header('location:../buyProduct.php');
            exit;
        }else{
            die('ERROR: unable to select product');
        }
    }

    public function decideQuantity($request){
        if($request['stocknum'] < $request['buy-quantity']){
            header('location:../buyProduct.php');

        }else{
            $totalPrice = $request['buy-quantity'] * $request['price'];
            header('location:../payProduct.php');
        }
    }  
}