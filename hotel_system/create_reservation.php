<?php
// create_reservation.php — Hotel System (pc1 / webserver1)
// Handles the "Store" / "Create" arrows in the diagram:
// takes the submitted reservation form and saves it into the hotel_system database.

require_once "db_config.php";
header("Content-Type: application/json");

$customer_name = $_POST['customer_name'] ?? '';
$check_in      = $_POST['check_in'] ?? '';
$check_out     = $_POST['check_out'] ?? '';
$employee_name = $_POST['employee_name'] ?? '';
$employee_id   = $_POST['employee_id'] ?? '';

if (!$customer_name || !$check_in || !$check_out || !$employee_name || !$employee_id) {
    echo json_encode(["success" => false, "message" => "All fields are required."]);
    exit;
}

$stmt = $conn->prepare(
    "INSERT INTO reservations (customer_name, check_in, check_out, employee_name, employee_id)
     VALUES (?, ?, ?, ?, ?)"
);
$stmt->bind_param("ssssi", $customer_name, $check_in, $check_out, $employee_name, $employee_id);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Reservation created successfully!"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

$stmt->close();
$conn->close();
