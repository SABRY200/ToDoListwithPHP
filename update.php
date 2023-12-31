<?php
require "Config/config.php";

if (isset($_GET['upd_id'])) {
    $id = $_GET['upd_id'];

    $select_data = $connect->query("SELECT * FROM tasks WHERE id='$id'");
    $data = $select_data->fetch(PDO::FETCH_OBJ);


    if (isset($_POST['submit'])) {
        $update_name = $_POST['update_name'];
        $update = $connect->prepare("UPDATE tasks SET name = :name WHERE id ='$id'");
        $update->execute([
            ':name' => $update_name
        ]);
        header("location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div class="container">
        <form method="POST" action="update.php?upd_id=<?php echo $id; ?>" class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">UPDATE</label>
                <input type="text" name="update_name" value="<?php echo $data->name; ?>" class="form-control" id="inputPassword2" placeholder="Enter Task">
            </div>
            <input type="submit" name="submit" value="update" class="btn btn-primary mb-2">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>