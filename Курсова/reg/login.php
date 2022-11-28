<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Логін</title>
    <link href="/css/style2.css" media="screen" rel="stylesheet">
    <link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <?php
    session_start();
    ?>
    <?php require_once("connection.php"); ?>
    <?php
    if(isset($_SESSION["session_username"])){
        header("Location: intropage.php");
    }
    if(isset($_POST["login"])){

        if(!empty($_POST['username']) && !empty($_POST['password'])) {
            $username=htmlspecialchars($_POST['username']);
            $password=htmlspecialchars($_POST['password']);
            $n1=mysqli_connect("localhost","root","","userlistdb");
            $query =mysqli_query($n1,"SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");
            $numrows=mysqli_num_rows($query);
            if($numrows!=0)
            {
                while($row=mysqli_fetch_assoc($query))
                {
                    $dbusername=$row['username'];
                    $dbpassword=$row['password'];
                }
                if($username == $dbusername && $password == $dbpassword)
                {
                    $_SESSION['session_username']=$username;
                    header("Location: intropage.php");
                }
            }
            else {
                $message =  "Invalid username or password!";
            }
        }
        else {
            $message = "All fields are required!";
        }
    }
    ?>
    <?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
</head>
<body>
<div class="container mlogin">
    <div id="login">
        <h1>Авторизація</h1>
        <form action="" id="loginform" method="post" name="loginform">
            <p><label for="user_login">Ім'я користувача<br>
                    <input class="input" id="username" name="username" size="20"
                           type="text" value=""></label></p>
            <p><label for="user_pass">Пароль<br>
                    <input class="input" id="password" name="password" size="20"
                           type="password" value=""></label></p>
            <p class="submit"><input class="button" name="login" type= "submit" value="Авторизуватись"></p>
            <p class="regtext">Ще не зареєстровані?<br><a style="" href= "register.php">Нажміть сюди для реєстрації</a></p>
        </form>
    </div>
</div>
<footer>
    <div id="rights">
        Всі права захищені &copy; <?php echo date ('Y')?>
    </div>
</footer>
</body>
</html>