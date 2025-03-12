<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
</head>
<body>
    <form action="" method="post">
        <input name="task" />
        <input type="submit" name="submit" value="add">
    </form>

    <?php 
        if(isset($_POST['submit'])) {
            $task = $_POST['task'];
            include_once 'db.php';
            $SQL = "INSERT INTO tasks (title) VALUES (?)";
            $stmt = $db->prepare($SQL);
            $stmt->bind_param('s', $task);
            $stmt->execute();
            $stmt->close();
            echo "task added";
        }
    ?>
</body>
</html>