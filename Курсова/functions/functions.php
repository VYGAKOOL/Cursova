<?php
$db = new PDO("mysql:host=localhost;dbname=mysitebase", "root", "");
$info = [];
if ($query = $db ->query("SELECT * FROM `news`")) {
   $info = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    print_r($db->errorInfo());
}
?>