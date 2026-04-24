<!DOCTYPE html>
<html>
<head>
  <title>Lab 2 - Temperature Converter</title>
  <link rel="Stylesheet" href="style.css">
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
  <h1>🌡️ Temperature Converter</h1>
  <p>Convert between Celsius and Fahrenheit</p>

  <form method="POST">
    <label for="temp">Enter Temperature:</label>
    <input type="number" id="temp" name="temp" placeholder="Enter value" step="0.1" required>

    <label for="unit">Select Unit:</label>
    <select id="unit" name="unit" required>
      <option value="">-- Choose --</option>
      <option value="celsius">Celsius to Fahrenheit</option>
      <option value="fahrenheit">Fahrenheit to Celsius</option>
    </select>

    <input type="submit" value="Convert">
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temp = floatval($_POST["temp"]);
    $unit = $_POST["unit"];

    if (empty($unit)) {
      echo "<div class='error'>❌ Please select a conversion type</div>";
    } else {
      if ($unit == "celsius") {
        $result = ($temp * 9/5) + 32;
        $from = "°C";
        $to = "°F";
      } else {
        $result = ($temp - 32) * 5/9;
        $from = "°F";
        $to = "°C";
      }

      echo "<div class='result'>";
      echo "<h3>✓ Conversion Result</h3>";
      echo "<p><strong>Input:</strong> $temp $from</p>";
      echo "<p><strong>Output:</strong> " . round($result, 2) . " $to</p>";
      echo "</div>";
    }
  }
  ?>
</div>
</body>
</html>