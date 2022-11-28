<?php
$db = new PDO("mysql:host=localhost;dbname=mysitebase", "root", "");
$info = [];
if ($query = $db ->query("SELECT * FROM `news`")) {
    $info = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    print_r($db->errorInfo());
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php
    $title = "Тупо класний сайт";
    require_once "blocks/head.php";
    ?>
</head>
<body>
    <?php require_once "blocks/header.php" ?>
    <div id="wrapper">
        <div id="leftColumn">
            <?php foreach ($info as $data): ?>
            <div style="text-align: center" id="bigArticle">
                <img src="<?= $data['image'];?>" alt="Новина 1">
                <h2><?= $data['title'];?></h2>
                <p><?= $data['full_text'];?></p>
                <a href="<?= $data['url'];?>">
                    <div class="more">Дальше</div>
                </a>
            </div>
            <div class="clear">
                <br>
            </div>
            <?php endforeach;?>
<!--            <div class="article">-->
<!--                <img src="/img/article_1.jpg.png" style="width: 60%;" alt="Новина 1">-->
<!--                <h2>Новина 1</h2>-->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias autem corporis distinctio dolore ducimus eaque eligendi enim error, esse illum mollitia natus numquam quasi quisquam quo quod, quos sint temporibus tenetur vitae! Aliquid aspernatur consequatur earum iusto, minima minus nobis, omnis quas quod rem similique sint, ullam! Explicabo iure, perferendis!</p>-->
<!--                <a href="/article.php">-->
<!--                    <div class="more">Дальше</div>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="article">-->
<!--                <img src="/img/article_1.jpg.png" alt="Новина 1">-->
<!--                <h2>Новина 1</h2>-->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias autem corporis distinctio dolore ducimus eaque eligendi enim error, esse illum mollitia natus numquam quasi quisquam quo quod, quos sint temporibus tenetur vitae! Aliquid aspernatur consequatur earum iusto, minima minus nobis, omnis quas quod rem similique sint, ullam! Explicabo iure, perferendis!</p>-->
<!--                <a href="/article.php">-->
<!--                    <div class="more">Дальше</div>-->
<!--                </a>-->
<!--            </div>-->
        </div>
        <?php require_once "blocks/rightColumn.php" ?>
    </div>
    <?php require_once "blocks/footer.php" ?>
</body>
</html>