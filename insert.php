<?php 
require "Config/config.php";

if(isset($_POST['submit'])){
    $task = $_POST['mytask'];
    $insert_task = $connect->prepare("INSERT INTO tasks (name) VALUES (:name)");
    $insert_task->execute([ ':name' => $task ]);
    header("location: index.php");
}

?>