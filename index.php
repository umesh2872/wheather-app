<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Checker</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="container">
        <h1>Weather Checker</h1>
        <form action="weather.php" method="GET">
            <input type="text" name="city" placeholder="Enter city name" required>
            <button type="submit">Check Weather</button>
        </form>

        <?php if (isset($_GET['error'])): ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
