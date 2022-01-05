<?php
require_once ('DBConnection.php');
require_once ('header.php');
$selectAllPeople = "SELECT people.Id, people.FirstName, people.LastName, position.Name
FROM people JOIN position
ON people.PositionId = position.Id";
$people = mysqli_query($connect, $selectAllPeople);
?>

<body>
<div class="sort">
    <p id="Login"><a href="logout.php">Вийти з акаунту</a></p>
</div>
<div class="table">
    <div class="container" style="width: 60%">
        <p class="center">Усі співробітники</p>
        <table class="table">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Position</th>
            </tr>
            <?php
            while($object = mysqli_fetch_object($people)) {

                echo"<form action='Delete.php' method='post'>
                    <tr>
                        <td>$object->FirstName</td>
                        <td>$object->LastName</td>
                        <td>$object->Name</td>
                        <td><button type='submit' class='btn btn-success' name='DeleteButton' value='$object->Id'>Видалити</button></td>
                    </tr>
                </form>";
            }
            ?>

        </table>
        <div class="add"><a href="insertDB.php">Додати персонал</a></div>

    </div>
</div>

</body>
</html>
