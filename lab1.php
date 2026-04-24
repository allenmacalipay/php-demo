<!DOCTYPE html>
<html>
<head>
  <title>Lab 1 - My Favorite Fruits</title>
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
  <h1>🍎 My Favorite Fruits</h1>
  <p>Enter your top 5 fruits</p>

  <!-- Form -->
  <form method="POST">
    <input type="text" name="fruit1" placeholder="Fruit 1" required>
    <input type="text" name="fruit2" placeholder="Fruit 2" required>
    <input type="text" name="fruit3" placeholder="Fruit 3" required>
    <input type="text" name="fruit4" placeholder="Fruit 4" required>
    <input type="text" name="fruit5" placeholder="Fruit 5" required>
    <input type="submit" value="Submit">
  </form>

  <div class="output">
    <?php
    // Check if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // Create array from submitted values
      $fruits = array(
        htmlspecialchars($_POST["fruit1"]),
        htmlspecialchars($_POST["fruit2"]),
        htmlspecialchars($_POST["fruit3"]),
        htmlspecialchars($_POST["fruit4"]),
        htmlspecialchars($_POST["fruit5"])
      );

      echo "<h3>Fruit List</h3>";

      echo "<table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Fruit Name</th>
                </tr>
              </thead>
              <tbody>";

      // Display fruits using foreach
      foreach ($fruits as $index => $fruit) {
        echo "<tr><td>" . ($index + 1) . "</td><td>$fruit</td></tr>";
      }

      echo "</tbody></table>";

      // Display favorite fruit (first one)
      echo "<p><strong>My Favorite Fruit:</strong> " . $fruits[0] . "</p>";

      // Display total count
      echo "<p><strong>Total Fruits:</strong> " . count($fruits) . "</p>";
    }
    ?>
  </div>
</div>

</body>
</html>