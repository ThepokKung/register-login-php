<?php
session_start();
include('connect.php');

$error = array();

if (isset($_POST['reg_user'])) {
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
    $user_pass1 = mysqli_real_escape_string($conn, $_POST['user_pass_1']);
    $user_pass2 = mysqli_real_escape_string($conn, $_POST['user_pass_2']);

    if (empty($user_name)) {
        array_push($error, "Null user name");
    }
    if (empty($user_phone)) {
        array_push($error, "Null user phone");
    }
    if (empty($user_pass1)) {
        array_push($error, "Null user pass");
    }
    if ($user_pass1 != $user_pass2) {
        array_push($error, "Password not math");
    }

    $user_check_query = "SELECT * FROM user WHERE user_name = '$user_name' OR user_phone = '$user_phone'  LIMIT 1";
    $query = mysqli_query($conn, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        if ($result['user_name'] === $user_name) {
            array_push($error, "user already ");
        }
        if ($result['user_phone'] === $user_phone) {
            array_push($error, "user already ");
        }
    }

    if (count($error) == 0) {
        $user_pass1 = md5($user_pass1);

        $imgname = $_FILES['user_pic']['name'];

        move_uploaded_file($_FILES['user_pic']['tmp_name'], 'file/' . $_FILES['user_pic']['name']);

        $sql = "INSERT INTO user(user_name, user_phone, user_pass,user_pic) VALUES ('$user_name','$user_phone','$user_pass1','$imgname');";

        mysqli_query($conn, $sql);

        $_SESSION['user_name'] = $user_name;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    } else {
        array_push($error, "Username & Password is required");
        $_SESSION['error'] = "Username & Password is required";
        header("location: register.php");
    }
}
