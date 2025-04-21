<?php
// OpenWeatherMap API key
$apiKey = "1afd5df7793ced021fd16e386797c606";

if (isset($_GET['city'])) {
    $city = $_GET['city'];

    // API URL banate hain
    $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=$city&units=metric&appid=$apiKey";

    // API se response lena
    $response = file_get_contents($apiUrl); 
    $data = json_decode($response, true);

    // Error handling agar city name galat ho ya data fetch na ho paye
    if ($data['cod'] == 200) {
        $weather = $data['weather'][0]['description'];
        $temperature = $data['main']['temp'];

        // Result ko display karna
        echo "<h1>Weather in $city</h1>";
        echo "<p>Temperature: $temperature °C</p>";
        echo "<p>Condition: $weather</p>";
        echo '<p><a href="index.php">Check another city</a></p>';
    } else {
        // Agar city name galat ho ya API request fail ho jaye toh error display karna
        $error = "Could not retrieve weather data for $city. Please try another city.";
        header("Location: index.php?error=" . urlencode($error));
        exit;
    }
} else {
    // Agar city name na diya ho toh user ko wapas redirect karna
    header("Location: index.php");
    exit;
}
?>
