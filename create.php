<?php
require_once 'DBConnection.php';
$fn = $_POST['FirstName'];
$ln = $_POST['LastName'];
$pos = $_POST['Position'];
$str = "INSERT INTO `People` (`FirstName`, `LastName`, `PositionId`) VALUES ('$fn', '$ln', '$pos')";
mysqli_query($connect, $str);
header("Location: ../main.php");