<?php
include 'Connection.php';

class User extends Connection{
    
    public function create($request){
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $uname = $request['uname'];
        $password = password_hash($request['password'],PASSWORD_DEFAULT);

        $sql_accounts = "INSERT INTO `users` (`first_name`,`last_name`,`username`, `password`) VALUES ('$firstname', '$lastname','$uname','$password')";

        if($this->conn->query($sql_accounts)){
            header('location:../login.php');
            exit;
        }else{
            die("ERROR:unable to add user");
        }
    }

    public function login($request){
        $uname = $request['uname'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$uname'";


        if($result = $this->conn->query($sql)){
            $user_details = $result->fetch_assoc();
            if($result->num_rows == 1){
                if(password_verify($password,$user_details['password'])){
                    session_start();
                    $_SESSION['uname'] = $user_details['username'];
                    header("location:../dashbord.php");
                }else{
                    die("Error: " . $this->conn->error);
                }
            }else{
                die("Error: " . $this->conn->error);
            }
        }else {
            die("Error: " . $this->conn->error);
        }
    }
}