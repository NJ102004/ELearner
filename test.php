<!DOCTYPE html>
<html>
<head>
    <title>Discount Calculator</title>
</head>
<body>
    <h2>Discount Calculator</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="original_price">Original Price:</label>
        <input type="number" name="original_price" id="original_price" step="0.01" required><br><br>

        <label for="discount">Select Discount:</label>
        <select name="discount" id="discount">
            <option value="0">No Discount</option>
            <option value="10">10%</option>
            <option value="20">20%</option>
            <option value="50">50%</option>
            <option value="80">80%</option>
        </select><br><br>

        <input type="submit" name="calculate" value="Calculate Discount">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $original_price = $_POST['original_price'];
        $discount_rate = $_POST['discount'];
        
        $discounted_price = $original_price - ($original_price * ($discount_rate / 100));
        
        echo "<h3>Discounted Price:</h3>";
        echo "<p>$discounted_price</p>";
    }
    ?>
</body>
</html>
