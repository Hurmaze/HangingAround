<?php
require_once ('DBConnection.php');
unset($_SESSION['logged_user']);
header("Location: index.php");