<?php
    require 'config.php';

    if($_POST){
        $title = $_POST['title'];
        $description = $_POST['description'];

        $sql = "INSERT INTO todo(title,description) VALUES (:title,:description)";
        $pdoStatement = $pdo->prepare($sql);
        $result = $pdoStatement->execute(
            array(
                ':title' => $title,
                ':description' => $description
            )
        );
        if($result){
            echo "<script>alert('New To Do is added.');window.location.href='index.php';</script>";
        };
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Create New</title>
</head>
<body>
    <div class="container card my-5">
        <div class="card-body">
            <h2>Create New Todo</h2>
        <form class="" action="create.php" method="post">
            <div class="form-group my-3">
                <label>Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group my-3">
                <label>Description</label>
                <textarea type="text" class="form-control" name="description" rows="5" cols="40"></textarea>
            </div>
            <div class="form-group my-3">
                <input type="submit" value="Submit" class="btn btn-primary">
                <a href="index.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
        </div>
    </div>
</body>
</html>