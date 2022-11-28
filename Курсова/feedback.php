<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Зворотній зв'язок</title>
    <link rel="stylesheet" href="/css/style.css">
    <?php
    if(isset($_POST["feedback"])){
        if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['full_text']) ) {
            $username=htmlspecialchars($_POST['username']);
            $email=htmlspecialchars($_POST['email']);
            $full_text=htmlspecialchars($_POST['full_text']);
            $link=mysqli_connect("localhost","root","","feedback");
            $numrows = 0;
            if($numrows==0)
            {
                $sql="INSERT INTO feedbacktbl (username, email, full_text)
	            VALUES('$username','$email', '$full_text')";
                $result=mysqli_query($link,$sql);
                if($result){
                    $message = "Ur message successfully sent";
                } else {
                    $message = "Failed to insert data information!";
                }
            }
        } else {
            $message = "All fields are required!";
        }
    }
    ?>
</head>
<body>

<?php require_once "blocks/header.php" ?>
<div id="wrapper" style="height: 78vh">
<!--    <div id="leftColumn">-->
<!--        <form action="feedback.php" id="feedbackform" method="post" name="feedbackform">-->
<!--        <input type="text" placeholder="Ваше Ім'я" id="username" name="username"><br />-->
<!--        <input type="text" placeholder="email" id="email" name="email"><br />-->
<!--        <textarea name="message" id="message" placeholder="Введіть ваше повідомлення"></textarea>-->
<!--        <input type="button" placeholder="Done" id="Done" name="Done" value="Відправити"><br />-->
<!--        </form>-->
<!--    </div>-->
    <div id="leftColumn">
        <?php if (!empty($message)) {echo "<p class=\"error\">" .  $message . "</p>";} ?>
        <form action="feedback.php" id="feedbackform" method="post" name="feedbackform">
            <p><label for="user_login">Ім'я Користувача<br>
                    <input class="input" id="username" name="username" size="32"  type="text" value=""></label></p>
            <p><label for="user_pass">E-mail<br>
                    <input class="input" id="email" name="email" size="32" type="email" value=""></label></p>
            <p><label for="user_pass">Текст повідомлення<br>
                    <input class="input" id="full_text" name="full_text" size="32"   type="text" value=""></label></p>
            <p class="submit"><input class="button" id="feedback" name= "feedback" type="submit" value="Надіслати"></p>
        </form>
    </div>

    <?php require_once "blocks/rightColumn.php" ?>
</div>
<?php require_once "blocks/footer.php" ?>
</body>
</html>