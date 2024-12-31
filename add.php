<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include("db.php");

if (isset($_POST['add'])) {
    $rollno = $_POST["rollno"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $photo = $_FILES["photo"]["name"];
    $uploadDir = __DIR__ . "/uploads/";
    $targetPath = $uploadDir . basename($photo);

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetPath)) {
        $insetQuery = "INSERT INTO student (rollno,name,email,photo) VALUES($rollno,'$name','$email','$photo')";
        $result = mysqli_query($connection, $insetQuery);
        if ($result) {
            header("Location: index.php");
        } else {
            echo "<script>alert('Something went wrong');</script>";
        }
    } else {
        echo "<script>alert('Something went wrong in File uploading');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <label for="rollno">Rollno</label>
        <input type="text" name="rollno"><br><br>
        <label for="name">Name</label>
        <input type="text" name="name"><br><br>
        <label for="email">Email</label>
        <input type="text" name="email"><br><br>
        <label for="photo">Photo</label>
        <input type="file" name="photo"><br><br>
        <button type="submit" name="add">Add</button>
    </form>
</body>

</html>