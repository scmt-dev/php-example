<?php
require_once 'Account.php';
require_once 'Transaction.php';

$account = new Account();
$transaction = new Transaction();

// Create a new account
// $account->create('ACC006', 'Fongsy Pathammavong', 'LAK');

// Deposit money
// $transaction->deposit(1, 500.00, 'Cash deposit');

// Transfer money from Alice (id=1) to Bounmy (id=2)
// $transaction->transfer(1, 2, 200.00, 'Payment for services');

if(isset($_POST['account_type']) && isset($_POST['account_number']) && isset($_POST['full_name'])) {
    $id = $account->create($_POST['account_number'], $_POST['full_name'], $_POST['account_type']);
    $transaction->deposit($id, $_POST['amount'], 'Cash deposit');
}

?>

<!-- form to create a new account -->
<form action="" method="post">
    <select name="account_type">
        <option value="LAK">LAK</option>
        <option value="USD">USD</option>
        <option value="THB">THB</option>
        <option value="YCN">YCN</option>
    </select>
    <input type="text" name="account_number" placeholder="Account Number">
    <input type="text" name="full_name" placeholder="Full Name">

    <h3>Transaction</h3>
    <input type="number" name="amount" placeholder="Amount" value="50000">

    <input type="submit" value="Create Account">
</form>
