<?php

session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include("db.php");

$studentData = [];
$selectQuery = "SELECT * FROM student";
$student = mysqli_query($connection, $selectQuery);
$studentData = mysqli_fetch_all($student, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical</title>
</head>

<body>
    <a href="add.php">
        <button>
            Add
        </button>
    </a>
    <a href="logout.php">
        <button>
            logout
        </button>
    </a>

    <table border="2">
        <tr>
            <th>Rollno</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        if (count($studentData) > 0) {
            foreach ($studentData as $data) {

        ?>
                <tr>
                    <td><?= $data["rollno"] ?></td>
                    <td><?= $data["name"] ?></td>
                    <td><?= $data["email"] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $data['id'] ?>"><button>edit</button></a>
                        <a href="delete.php?id=<?= $data['id'] ?>"><button>delete</button></a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>

</html>