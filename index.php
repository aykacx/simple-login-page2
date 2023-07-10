<!DOCTYPE html>
<html>

<head>
    <title>LOGIN PAGE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        .security-code {
            font-weight: bold;
            text-align: center;
            font-size: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>LOGIN PAGE</h1>
        <form action="" method="POST">
            <label>Username:</label>
            <input class="textbox" type="text" name="username">

            <label>Password:</label>
            <input class="textbox" type="password" name="password">

            <label>Security Code:</label>
            <div class="security-code">
                <del>
                    <?php $produce = substr(md5(microtime()), rand(0, 26), 6);
                    echo $produce; ?>
                </del>
            </div>

            <label>Enter security code:</label>
            <input class="textbox" type="text" name="s_code">

            <input class="button" type="submit" name="login" value="LOGIN">
        </form>

        <?php
        session_start();
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $scode = $_POST['s_code'];
            if ($username == "halil" && $password == "1234" && $scode == is_string($produce)) {
                $_SESSION['name'] = $username;
                $_SESSION['pass'] = $password;
                header("location:home_page.php");
            } else {
                echo "<div class='error-message'>The entered information is incorrect.</div>";
            }
        }
        ?>
    </div>
</body>

</html>