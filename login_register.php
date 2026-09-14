<?php 

session_abort();
require_once 'config.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['name'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email is already registered!';
        $_SESSION['active_form'] = 'register';
    } else {
        $conn->query("INSERT INTO users(name, email, password, role) VALUES('$name', '$email', '$password', '$role') ");
    }

    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    // find the email on the users table(email eka found nam)
    if ($result->num_rows > 0) {
        // retrive the users data from query result using featch association method
        $user = $result->fetch_assoc();
        // match the enterted password with encypted password in the database
        if (password_verify($password, $user['password'])) {
            // store karanawa user ge name ekayi email ekayi
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            if ($user['role'] === 'admin') {
                // redirect karanawa admin_page page ekata
                header("Location: admin_page.php");
            } else {
                header("Location: user_page.php");
            }
            // stop the execution
            exit();
        }
    }

    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';
    header("Location: index.php");
    exit();
}


?>