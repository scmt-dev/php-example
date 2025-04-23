<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>

</head>
<body>

    <h2 style="text-align:center;">Add New Customer</h2>
    <form action="insert.php" method="POST">
        <label>Sex:</label>

            <input type="radio" name="sex" value="Female" required> Female
            <input type="radio" name="sex" value="Male"> Male

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        
       <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
       </div>

        <div>
        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="3" required></textarea>
        </div>

        <button type="submit">Save</button>
    </form>

</body>
</html>
