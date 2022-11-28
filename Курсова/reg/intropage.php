<link rel="stylesheet" href="/css/style2.css">
<?php
session_start();
if(!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    ?>
    <div id="welcome">
        <h2>Ласкаво просимо, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
        <p><a href="logout.php">Вийти із системи</a>  або <a href="/index.php">Повернутись на головну сторінку</a></p>
    </div>
<?php endif; ?>