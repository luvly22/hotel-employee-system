<?php
// db_config.php — Hotel System (pc1 / webserver1)

$host = "localhost";
$db_user = "root";
$db_pass = "";          // set your MySQL password here if you have one
$db_name = "hotel_system";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    http_response_code(500);
    die(json_encode(["error" => "Hotel DB connection failed: " . $conn->connect_error]));
}
