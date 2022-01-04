<?php
require_once ('DBConnection.php');
require_once ('header.php');
$positions = "SELECT Id, Name FROM Position";
$positions = mysqli_query($connect, $positions);

?>

<form action="create.php" method="post">
    <p>Назва туру</p>
    <?php
    echo "<select name = 'Position'>";
    while($object = mysqli_fetch_object($positions)){
        echo "<option value = '$object->Id' > $object->Name </option>";}
    echo "</select>"; ?>
    <p>Ім'я</p>
    <textarea name=FirstName></textarea>
    <p>Фамілія</p>
    <textarea name="LastName"></textarea>
    <button type="submit" class="btn btn-success">Добавить</button>
</form>
