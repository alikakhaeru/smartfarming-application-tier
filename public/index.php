<?php
header("Content-Type: application/json");

echo json_encode([
    "app" => "Smart Farming API",
    "status" => "running",
    "endpoints" => [
        "/sensor.php",
        "/lahan.php",
        "/tanaman.php"
    ]
]);
