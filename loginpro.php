<?php

session_start();
include('connect.php');

$error = array();

if (isset($_POST['login_user'])) {
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_pass = mysqli_real_escape_string($conn, $_POST['user_pass']);

    if (empty($user_name)) {
        array_push($error, "user empty");
    }
    if (empty($user_pass)) {
        array_push($error, "pass empty");
    }

    if (count($error) == 0) {
        $user_pass = md5($user_pass);
        $query = "SELECT * FROM user WHERE user_name = '$user_name' AND user_pass = '$user_pass'";
        $resutl = mysqli_query($conn, $query);

        if (mysqli_num_rows($resutl) == 1) {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['success'] = "You logged in";
            header("location: index.php");
        } else {
            array_push($error, "Sometink Wrong");
            $_SESSION['error'] = "Try again";
            header('location: login.php');
        }
    } else {
        array_push($error, "Username & Password is required");
        $_SESSION['error'] = "Username & Password is required";
        header("location: login.php");
    }
}
