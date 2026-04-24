<!DOCTYPE html>
<html>
<head>
  <title>Lab 3 - ATM Machine Simulation</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
  <div class="logo">ITEC 65 Lab</div>
  <div class="nav-links">
    <a href="index.php">Home</a>
    <a href="lab1.php">Fruits</a>
    <a href="lab2.php">Temperature</a>
    <a href="lab3.php">ATM</a>
  </div>
</nav>

<div class="container">
  <h1>🏧 ATM Machine Simulation</h1>
  <p>Manage your account transactions</p>

  <!-- Form -->
  <form method="POST">
    <input type="text" name="account_name" placeholder="Account Name" required>

    <input type="number" name="initial_balance" placeholder="Initial Balance" required>

    <label for="action">Select Action:</label>
    <select name="action" required>
      <option value="check">Check Balance</option>
      <option value="deposit">Deposit</option>
      <option value="withdraw">Withdraw</option>
    </select>

    <input type="number" name="amount" placeholder="Amount (for Deposit/Withdraw)">

    <input type="submit" value="Submit">
  </form>

  <div class="output">
    <?php

    // ATM Class
    class ATM {
      private $accountName;
      private $balance;

      public function __construct($accountName, $balance) {
        $this->accountName = $accountName;
        $this->balance = $balance;
      }

      public function getAccountName() {
        return $this->accountName;
      }

      public function getBalance() {
        return $this->balance;
      }

      public function deposit($amount) {
        if ($amount > 0) {
          $this->balance += $amount;
          return "✓ Successfully deposited ₱$amount.";
        } else {
          return "✗ Invalid deposit amount.";
        }
      }

      public function withdraw($amount) {
        if ($amount <= 0) {
          return "✗ Invalid withdrawal amount.";
        } elseif ($amount > $this->balance) {
          return "✗ Insufficient balance.";
        } else {
          $this->balance -= $amount;
          return "✓ Successfully withdrew ₱$amount.";
        }
      }
    }

    // Check if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $name = htmlspecialchars($_POST["account_name"]);
      $balance = floatval($_POST["initial_balance"]);
      $action = $_POST["action"];
      $amount = isset($_POST["amount"]) ? floatval($_POST["amount"]) : 0;

      // Create ATM object
      $atm = new ATM($name, $balance);

      echo "<h3>Account Summary</h3>";
      echo "<p><strong>Account Name:</strong> " . $atm->getAccountName() . "</p>";

      // Perform action
      if ($action == "check") {
        echo "<p><strong>Current Balance:</strong> ₱" . $atm->getBalance() . "</p>";
      } elseif ($action == "deposit") {
        echo "<p>" . $atm->deposit($amount) . "</p>";
        echo "<p><strong>Updated Balance:</strong> ₱" . $atm->getBalance() . "</p>";
      } elseif ($action == "withdraw") {
        echo "<p>" . $atm->withdraw($amount) . "</p>";
        echo "<p><strong>Updated Balance:</strong> ₱" . $atm->getBalance() . "</p>";
      }
    }
    ?>
  </div>
</div>

</body>
</html>