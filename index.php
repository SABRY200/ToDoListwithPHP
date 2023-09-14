<?php 
require "Config/config.php";
$select_data = $connect->query("SELECT * FROM tasks");
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
        <form action="insert.php" method="POST" class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Create</label>
                <input type="text" name="mytask" class="form-control" id="inputPassword2" placeholder="Enter Task">
            </div>
            <input type="submit" name="submit" class="btn btn-primary mb-2" value="insert">
        </form>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Task Name</th>
                <th>DELETE</th>
                <th>UPDATE</th>
            </thead>
            <tbody>
                <?php
                    while($data = $select_data->fetch(PDO::FETCH_OBJ)) : ?>
                        <tr>
                            <td><?php echo $data->id; ?></td>
                            <td><?php echo $data->name; ?></td>
                            <td><a class="btn btn-danger" href="delete.php?del_id=<?php echo $data->id; ?>">DELETE</a></td>
                            <td><a class="btn btn-warning" href="update.php?upd_id=<?php echo $data->id; ?>">UPDATE</a></td>
                        </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>