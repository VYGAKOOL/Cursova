<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("connection.php"); ?>
    <meta charset="utf-8">
    <title>Регістрація</title>
    <link href="/css/style2.css" media="screen" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
    <?php
    if(isset($_POST["register"])){
        if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
            $full_name= htmlspecialchars($_POST['full_name']);
            $email=htmlspecialchars($_POST['email']);
            $username=htmlspecialchars($_POST['username']);
            $password=htmlspecialchars($_POST['password']);
            $n1=mysqli_connect("localhost","root","","userlistdb");
            $query=mysqli_query($n1,"SELECT * FROM usertbl WHERE username='".$username."'");
            $numrows=mysqli_num_rows($query);
            if($numrows==0)
            {
                $sql="INSERT INTO usertbl (full_name, email, username,password)
	            VALUES('$full_name','$email', '$username', '$password')";
                $result=mysqli_query($n1,$sql);
                if($result){
                    header("location:login.php");
                } else {
                    $message = "Failed to insert data information!";
                }
            } else {
                $message = "That username already exists! Please try another one!";
            }
        } else {
            $message = "All fields are required!";
        }
    }
    ?>
    <?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
</head>
<body>
<div class="container mregister">
    <div id="login">
        <h1>Реєстрація</h1>
        <form action="register.php" id="registerform" method="post" name="registerform">
            <p><label for="user_login">Ваше ім'я<br>
                    <input class="input" id="full_name" name="full_name" size="32"  type="text" value=""></label></p>
            <p><label for="user_pass">E-mail<br>
                    <input class="input" id="email" name="email" size="32" type="email" value=""></label></p>
            <p><label for="user_pass">Ім'я Користувача<br>
                    <input class="input" id="username" name="username" size="20" type="text" value=""></label></p>
            <p><label for="user_pass">Пароль<br>
                    <input class="input" id="password" name="password" size="32"   type="password" value=""></label></p>
            <p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зареєструватися"></p>
            <p class="regtext">Вже заєрестровані?<br> <a href= "login.php">Нажміть сюди для авторизації</a></p>
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