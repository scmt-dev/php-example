<?php 
    include_once '../db.php';
    $SQL = "SELECT * FROM customers";
    $result = $db->query($SQL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
</head>
<body>

    <a href="add-customer.php">Add</a>
    <table border=1>
        <tr>
            <th>Sex</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php 
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                    echo "<td>{$row['sex']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['phone']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>";    
                        echo "<a href='edit-customer.php?id={$row['id']}'>Edit</a> | ";
                        echo "<a href='#'>Delete</a>";
                    echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>

</body>
</html>