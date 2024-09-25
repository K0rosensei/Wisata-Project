<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login Form Design | CodeLab</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="wrapper">
        <div class="title">
            ADMIN Register
        </div>
        <form action="../../config/signupAdmin.php" method="POST">
            <div class="field">
                <input type="text" name="name" required>
                <label>Full Name</label>
            </div>

            <div class="field">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="field">
                <input type="text" name="email" required>
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
                Have an Account? <a href="login.php">Sign In now</a>
            </div>
        </form>
    </div>
</body>

</html>