<?php
require_once ('DBConnection.php');
require_once ('header.php');
$data = $_POST;
if (isset($data['logIn']))
{
    $error = false;
    if (trim($data['login'])=='')
    {
        echo "<script>alert('Введіть логін');</script>";
        $error = true;
    }
    if (trim($data['password'])=='')
    {
        echo "<script>alert('Введіть пароль');</script>";
        $error = true;
    }
    if(!$error)
    {
        $lg = $data['login'];
        $ps = $data['password'];
        $pass = mysqli_query($connect, "SELECT `Password` FROM `Admins` WHERE `Login`='$lg'");
        if (!$pass)
            echo "<p style='color: red'><strong>Логін або пароль введений не правильно</strong></p>";
        else {
            $pass = mysqli_fetch_object($pass);
            if (password_verify($ps, $pass->Password)) {
                $_SESSION['logged_user'] = $lg;
                echo "<p style='color: green'><strong>Ви авторизувалися! </strong></p>";
                header('Location:main.php');
            } else
                echo "<p style='color: red'><strong>Логін або пароль введений не правильно</strong></p>";
        }
    }
}
?>
<div class="container">
    <form action="index.php" method="post">
        <p><strong>Ваш логін:</strong></p><br>
        <input type="text" name="login" value="<?php echo @$data['login']?>"><br>
        <p><strong>Ваш пароль:</strong></p><br>
        <input type="password" name="password" value="<?php echo @$data['password']?>"><br>
        <p><button type='submit' class='btn btn-success' name="logIn" value="1">Увійти</button></p>
    </form>
</div>

