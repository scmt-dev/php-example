<?php

$colors = ['red', 'green', 'blue'];
echo $colors[0];
$colorModel = array(
                        "red"=> "#FF0000",
                        "green" => "#00FF00", 
                        "blue" => "#0000FF"
                    );
echo $colorModel["green"];
$customers = [
    "customer1" => [
        "name" => "John Doe",
        "email" => "VY7vQ@example.com",
        "address"=> [
            "street" => "123 Main St",
            "city" => "New York",
            "state" => "NY",
            "zip" => "10001"
        ]
    ],
    "customer2" => [
        "name" => "Mark",
        "email" => "c2@example.com",
        "address"=> [
            "street" => "123 Main St",
            "city" => "New York",
            "state" => "NY",
            "zip" => "10001"
        ]
    ],
];
echo $customers["customer2"]['name'];

print_r($customers);
var_dump($customers);

?>

<body style="background-color: <?php echo $colorModel["green"] ?>;">
    Hello
    <table border=1>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Address</td>
        </tr>
        <?php
        foreach($customers as $customer){
            echo "<tr>";
                echo "<td>{$customer["name"]}</td>";
                echo "<td>{$customer["email"]}</td>";
                echo "<td>{$customer["address"]["street"]}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>