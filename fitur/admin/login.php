<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login Form Design | CodeLab</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="wrapper">
        <div class="title">
            Admin Login
        </div>
        <form action="../../config/loginAdmin.php" method="POST">
            <div class="field">
                <input type="text" name="email" required>
                <input type="hidden" name="role" value="admin" required>
                <label>Email Address</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="field">
                <input type="submit" value="Login">
            </div>
            <div class="signup-link">
                Not a member? <a href="signUp.php">Signup now</a>
            </div>
        </form>
    </div>
</body>

</html>