<?php 
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        $person = [
            'name' => 'Mark AI',
            'age' => 30
        ];
        
        echo json_encode([
            'data'=> $person,
            'status' => 'success'
        ]);
        break;
    case 'POST':
        echo json_encode([
            'data'=> $_POST,
            'message' => 'success post method'
        ]);
        break;
    default :
        echo json_encode([
            'message'=> 'Method not allowed',
            'status' => 'error'
        ]);
        break;
}