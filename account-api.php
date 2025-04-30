<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$method = $_SERVER['REQUEST_METHOD'];

include_once 'db.php';

switch($method) {
    case 'GET':
        $sql = "SELECT * FROM accounts";
        $result = $db->query($sql);
        echo json_encode([
            'data'=> $result->fetch_all(MYSQLI_ASSOC),
            'status' => 'success'
        ]);
        break;
    case 'POST':
        $accountNumber = $_POST['account_number'] ?? null;
        $accountName = $_POST['account_name'] ?? null;
        $currency = $_POST['currency'] ?? null;

        if(!$accountNumber) {
            echo json_encode([
                'message'=> 'Account number is required',
                'status' => 'error'
            ]);
            exit();
        }

        if(!$accountName) {
            echo json_encode([
                'message'=> 'Account name is required',
                'status' => 'error'
            ]);
            exit();
        }
        // check currency [LAK, USD, THB]
        if(!in_array($currency, ['LAK', 'USD', 'THB'])) {
            echo json_encode([
                'message'=> 'Currency is invalid, Allowed: LAK, USD, THB',
                'status' => 'error'
            ]);
            exit();
        }
        // check account number exist
        
        // create account
        
        break;
    default :
        echo json_encode([
            'message'=> 'Method not allowed',
            'status' => 'error'
        ]);
        break;
}

