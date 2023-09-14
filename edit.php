<?php
    require "config.php";

    if($_POST){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $desc = $_POST['description'];

        $pdoStatement = $pdo->prepare("UPDATE todo SET title='$title', description='$desc' where id='$id'");
        $result = $pdoStatement->execute();

        if($result){
            echo "<script>alert('To Do is Updated.');window.location.href='index.php';</script>";
        };
    }else{
        $pdoStatement = $pdo->prepare("SELECT * from todo where id=".$_GET['id']);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchAll();
    }

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Edit Todo</title>
</head>
<body>
    <div class="container card my-5">
        <div class="card-body">
            <h2>Edit Todo</h2>
        <form class="" action="" method="post">
            <input type="hidden" name="id" value="<?php echo $result[0]['id'];?>">
            <div class="form-group my-3">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title']?>" required>
            </div>
            <div class="form-group my-3">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="5" cols="40"><?php echo $result[0]['description']?></textarea>
            </div>
            <div class="form-group my-3">
                <input type="submit" value="Update" class="btn btn-primary">
                <a href="index.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
        </div>
    </div>
</body>
</html>