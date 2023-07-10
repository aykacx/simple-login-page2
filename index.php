<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="" method="POST">
        <label for="username">Username: </label>
        <input class="textbox" id="username" type="text" name="username"><br>
        <label for="password">Password: </label>
        <input class="textbox" id="password" type="password" name="password"><br>
        <label>Sercurity code: </label>
        <?php
        session_start();
        $sCode = '';
        if (!empty($_SESSION['security_code'])) {
            $sCode = $_SESSION['security_code'];
        } else {
            $sCode = substr(md5(microtime()), rand(0, 26), 6);
            $_SESSION['security_code'] = $sCode;
        }
        ?>
        <label><del>
                <?php echo $sCode; ?>
            </del></label><br>
        <label>Enter security code</label>
        <input class="textbox" id="security_code" type="text" name="security_code"><br>
        <input class="button" type="submit" name="submit" value="Login">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $security_code = $_POST['security_code'];

        if ($username == 'halil' && $password == '1234' && $security_code == $sCode) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('location: home_page.php');
        } else {
            echo 'Login denied';
        }
    }
    ?>
</body>

</html>