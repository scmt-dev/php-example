<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Form</title>
</head>
<body>
    <form action="" method="post">
        Name: <input type="text" name="name">
        Age: <input type="number" name="age">
        Birthday: <input type="date" name="birthday">
        Sex: 
        <input type="radio" name="sex" value="Female"> Female
        <input type="radio" name="sex" value="Male"> Male
        Skill: 
        <input type="checkbox" name="skill[]" value="Football">
            Football
        <input type="checkbox" name="skill[]" value="ຕີດອກປີກໄກ່">
            ຕີດອກປີກໄກ່
        <input type="submit" name="submit" value="ok">
    </form>

    <?php
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $birthday = $_POST['birthday'];
            echo $name.' Age:'. $age. ' Years';
            print_r($_POST['skill']);
        }
    ?>
</body>
</html>