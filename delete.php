<?php 
require "Config/config.php";

if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $delete_row = $connect->prepare("DELETE FROM tasks where id = :id");
    $delete_row->execute([
        ':id' => $id
    ]);
    header("location: index.php");
}