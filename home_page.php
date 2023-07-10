<!DOCTYPE html>
<html>

<head>
    <title>HOME PAGE</title>
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

        .welcome-message {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .info {
            margin-bottom: 10px;
        }

        .logout-btn {
            background-color: #f44336;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
        }

        .logout-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>HOME PAGE</h1>
        <?php
        session_start();
        if (isset($_SESSION['name'])) {
            echo "<div class='welcome-message'>Welcome " . $_SESSION['name'] . "</div>";
            echo "<div class='info'>Password: " . $_SESSION['pass'] . "</div>";
        } else {
            header("location:index.php");
        }
        ?>

        <form method="POST">
            <input class="logout-btn" type="submit" name="logout" value="LOGOUT">
        </form>

        <?php
        if (isset($_POST['logout'])) {
            session_destroy();
            header("location:index.php");
        }
        ?>
    </div>
</body>

</html>