<?php
// get_employees.php — Employee System (pc2 / webserver2)
// This is the API endpoint the Hotel System frontend calls
// to populate the "employee name" dropdown.

require_once "db_config.php";

// Allow the Hotel System (running on a different host/port) to call this API.
// In production, replace * with the exact hotel system origin.
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$sql = "SELECT employee_id, employee_name, position FROM employees ORDER BY employee_name ASC";
$result = $conn->query($sql);

$employees = [];
while ($row = $result->fetch_assoc()) {
    $employees[] = $row;
}

echo json_encode($employees);

$conn->close();
