<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
            // set time zone
            date_default_timezone_set('Asia/Bangkok');
            echo date('d/m/Y');
        ?>
    </title>
</head>
<body>
    <?php 
        $date = date('D d F,Y H:i:s');
        $IP = $_SERVER['REMOTE_ADDR'];
        file_put_contents('log.txt',$IP.' '.$date.PHP_EOL, FILE_APPEND);
        echo $date;
        $colors = ['green',13 , true];
        echo $colors[0];
        echo $colors[1];
        var_dump($colors);
        var_dump($date);
        print_r($colors);
    ?>
</body>
</html>