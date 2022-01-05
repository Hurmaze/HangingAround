<?php
require_once ('DBConnection.php');
$del = $_POST['DeleteButton'];
$str = "DELETE FROM `People` WHERE `Id` = '$del'";
mysqli_query($connect, $str);
echo "<p style='color: green'><strong>Успішно видалено! можете перейти на <a href='../main.php'>головну</a> сторінку</strong></p>";
