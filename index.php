<?php 
session_start();

if(isset($_POST['submit'])) {
    $content = $_POST['content'];
    include_once 'db.php';
    $SQL = "INSERT INTO posts (content, user_id) VALUES (?,?)";
    $stmt = $db->prepare($SQL);
    $stmt->bind_param('si', $content, $_SESSION['user_id']);
    $stmt->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Home
    </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="flex">
        <h1>Humblack</h1>
       <div>
       <input type="text">
       </div>
        <ul class="flex">
            <li><?php echo $_SESSION['fullname'] ?></li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>

    <div>
        <form action="" method="post">
            <img width="30" src="https://avatars.githubusercontent.com/u/18229355?v=4" alt="Hero Image">
            <textarea name="content" placeholder="What's on your mind?"></textarea>
            <button name="submit">post</button>
        </form>
    </div>

</body>
</html>