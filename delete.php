<?php
    require 'config.php';

    $pdoStatement = $pdo->prepare("DELETE from todo where id=".$_GET['id']);
    $pdoStatement->execute();
    
    header("Location: index.php");