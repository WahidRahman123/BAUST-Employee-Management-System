<?php
session_start();
include "login_db_conn.php";

if(isset($_POST['submit']))
{
    if(isset($_POST['uname']) && isset($_POST['password'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    
    if(empty($uname)){
        header("Location: login_index.php?error=Name is required");
        exit();
    }
    elseif(empty($pass)) {
        header("Location: login_index.php?error=Password is required");
        exit();
    }
    
    $sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";
    
    $result = mysqli_query($link, $sql);
    
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if($row['username'] === $uname && $row['password'] === $pass) {
            echo "Logged In!";
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header("Location: home.php");
            exit();
        }
        else{
            header("Location: login_index.php?error=Incorrect Name or Password");
            exit();
        }
    }
    else{
        header("Location: login_index.php");
    }
}
else{
    echo 'Error Occured';
}