<?php
// db_config.php — Employee System (pc2 / webserver2)

$host = "localhost";
$db_user = "root";
$db_pass = "";          // set your MySQL password here if you have one
$db_name = "employee_system";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    http_response_code(500);
    die(json_encode(["error" => "Employee DB connection failed: " . $conn->connect_error]));
}
