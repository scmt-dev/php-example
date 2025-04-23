<?php
require_once 'Database.php';

class Account {
    private $conn;
    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function create($accountNumber, $accountName, $currency = 'LAK') {
        $sql = "INSERT INTO accounts (account_number, account_name, currency) 
                VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$accountNumber, $accountName, $currency]);
        return $this->conn->lastInsertId();
    }

    public function getBalance($accountId) {
        $stmt = $this->conn->prepare("SELECT balance FROM accounts WHERE id = ?");
        $stmt->execute([$accountId]);
        return $stmt->fetchColumn();
    }

    public function updateBalance($accountId, $newBalance) {
        $stmt = $this->conn->prepare("UPDATE accounts SET balance = ? WHERE id = ?");
        return $stmt->execute([$newBalance, $accountId]);
    }

    public function getById($accountId) {
        $stmt = $this->conn->prepare("SELECT * FROM accounts WHERE id = ?");
        $stmt->execute([$accountId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
