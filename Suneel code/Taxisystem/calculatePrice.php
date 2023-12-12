<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the origin and destination from the POST data
$origin = $_POST['origin'];
$destination = $_POST['destination'];

// Use the Google Maps Distance Matrix API to calculate the distance
$apiKey = 'YOUR_GOOGLE_MAPS_API_KEY'; // Replace with your Google Maps API key
$apiUrl = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=" . urlencode($origin) . "&destinations=" . urlencode($destination) . "&key=$apiKey";

// Use cURL for making the API request
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if ($response === FALSE) {
    echo 'Error fetching data from the API using cURL. Please try again.';
    exit;
}

curl_close($ch);

$data = json_decode($response, true);

if ($data['status'] !== 'OK') {
    echo 'Error in API response: ' . $data['status'];
    exit;
}

// Extract distance value in meters
$distance = $data['rows'][0]['elements'][0]['distance']['value'];

// Perform your pricing calculation based on the distance (customize as needed)
$basePrice = 10; // Set your base price
$pricePerKm = 0.5; // Set your price per kilometer

$price = $basePrice + ($distance / 1000 * $pricePerKm);

// Format the price to two decimal places
$formattedPrice = number_format($price, 2);

// Return the calculated price
echo 'Estimated Price: $' . $formattedPrice;

?>
