<?php 
    require 'config.php';

    $pdoStatement = $pdo->prepare("SELECT * from todo order by id DESC");
    $pdoStatement->execute();
    $result =  $pdoStatement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <title>ToDo</title>
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <h3><i class="bi bi-list-ul"></i>    TO DO LIST </h3>
            <div class="my-4">
                <a href="create.php" class="btn btn-primary">Create New <i class="bi bi-bookmark-heart-fill mx-2"></i></a>
            </div>
        <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Created</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
        <?php
           if($result){
            $i = 1;
            foreach ($result as $value) {
        ?>
        <tr>
        <th scope="row"><?php echo $i; ?></th>
            <td><?php  echo $value['title']; ?></td>
            <td><?php echo $value['description']; ?></td>
            <td><?php echo date("Y-m-d",strtotime($value['created_at'])); ?></td>
            <td>
            <a href="edit.php?id=<?php echo $value['id'];?>" class="btn btn-warning">Edit <i class="bi bi-pencil-square mx-2"></i></a>
            <a href="delete.php?id=<?php echo $value['id'];?>" class="btn btn-danger mx-3">Delete <i class="bi bi-trash3-fill mx-2"></i></a>
            
            </td>
        </tr>
            
        <?php
            $i++;
            }
            
           }
        ?>


  </tbody>
</table>
        </div>
    </div>
</body>
</html>
