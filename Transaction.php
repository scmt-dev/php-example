<?php
require_once 'Database.php';
require_once 'Account.php';

class Transaction {
    private $conn;
    private $account;

    public function __construct() {
        $this->conn = (new Database())->connect();
        $this->account = new Account();
    }

    public function deposit($accountId, $amount, $description = 'Deposit') {
        $this->conn->beginTransaction();
        try {
            $balance = $this->account->getBalance($accountId);
            $newBalance = $balance + $amount;

            $this->account->updateBalance($accountId, $newBalance);

            $sql = "INSERT INTO transactions (account_id, type, amount, description) 
                    VALUES (?, 'deposit', ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$accountId, $amount, $description]);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            echo "Deposit failed: " . $e->getMessage();
            return false;
        }
    }

    public function transfer($fromId, $toId, $amount, $description = 'Transfer') {
        $this->conn->beginTransaction();
        try {
            $fromBalance = $this->account->getBalance($fromId);
            $toBalance = $this->account->getBalance($toId);

            if ($fromBalance < $amount) {
                throw new Exception('Insufficient funds');
            }

            $this->account->updateBalance($fromId, $fromBalance - $amount);
            $this->account->updateBalance($toId, $toBalance + $amount);

            // Log transfer_out
            $sql1 = "INSERT INTO transactions (account_id, type, amount, description, related_account_id)
                     VALUES (?, 'transfer_out', ?, ?, ?)";
            $stmt1 = $this->conn->prepare($sql1);
            $stmt1->execute([$fromId, $amount, $description, $toId]);

            // Log transfer_in
            $sql2 = "INSERT INTO transactions (account_id, type, amount, description, related_account_id)
                     VALUES (?, 'transfer_in', ?, ?, ?)";
            $stmt2 = $this->conn->prepare($sql2);
            $stmt2->execute([$toId, $amount, $description, $fromId]);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            echo "Transfer failed: " . $e->getMessage();
            return false;
        }
    }
}
