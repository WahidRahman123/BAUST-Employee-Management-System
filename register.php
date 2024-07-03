<?php

$con = mysqli_connect('localhost', 'root', '', 'form');

if (!$con) {
    die("Error." . mysqli_connect_error());
}
if (!isset($_POST["username"], $_POST["password"], $_POST["email"])) {
    header("Location: registration.php?error=Empty Field(s)");
    exit();
}

if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["email"])) {
    header("Location: registration.php?error=Empty Field(s)");
    exit();
}
$input_name = $_POST["username"];


if ($stmt = $con->prepare("SELECT id,password from user WHERE username = ?")) {
    if (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        header("Location: registration.php?error=Please enter a valid name");
        exit();
    } else {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            header("Location: registration.php?error=Name already exist. Try again.");
        } else {
            if ($stmt = $con->prepare("INSERT INTO user (username, password, email) VALUES (?,?,?)")) {
                $password = $_POST['password'];
                $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
                $stmt->execute();
                header("Location: registration.php?res=Successfully Registered!");
            } else {
                header("Location: registration.php?error=Error Occured.");
            }
        }
        $stmt->close();
    }
} else {
    echo "Error Occurred";
}
$con->close();
