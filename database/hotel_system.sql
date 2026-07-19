-- ============================================
-- HOTEL SYSTEM DATABASE (runs on pc1 / webserver1)
-- ============================================

CREATE DATABASE IF NOT EXISTS hotel_system;
USE hotel_system;

CREATE TABLE IF NOT EXISTS reservations (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    employee_name VARCHAR(100) NOT NULL,   -- comes from Employee System via API
    employee_id INT NOT NULL,              -- comes from Employee System via API
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
