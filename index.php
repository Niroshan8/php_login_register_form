<?php 
session_start();
$errors = [
    'login' => $_SESSION['login_error'] ?? "",
    'register' => $_SESSION['register_error'] ?? "",
];

// mokadda active form kiyana eka
$activeForm = $_SESSION('active_form') ?? 'login';

// used to remove all existing session variables
session_unset();

function showError() {
    return !empty($error) ? "<p class='error-message'>$error</p>" : ""; 
}

// given form name match the active form name. if it does return active class
function isActiveForm() {
    return $formName === $activeForm ? 'active' : '';
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Full-Stack Login & Register Form with User & Admin Page</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
        <div class="form-box <?= isactiveForm('login', $activeForm) ?>" id="login-form">
            <form action="login_register.php" method="post">
                <h2>Login</h2>
                <?php showError($errors['login']) ?>
                <input type="email" name="email" placeholder="Enter Email" required>
                <input type="password" name="password" placeholder="Enter Password" required>
                
                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" onClick="showForm('register-form')" >Register</a></p>
            </form>
        </div>

         <div class="form-box <?= isactiveForm('register', $activeForm) ?>" id="register-form">
            <form action="" method="post">
                <h2>Register</h2>
                <?php showError($errors['register']) ?>
                <input type="text" name="name" placeholder="Enter Name" required>
                <input type="email" name="email" placeholder="Enter Email" required>
                <input type="password" name="password" placeholder="Enter Password" required>
                <select name="role" required>
                    <option value="">------Select Role-----</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                
                <button type="submit" name="login">Register</button>
                <p>Already have an account? <a href="#" onClick="showForm('login-form')">Login</a></p>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
  </body>
</html>
