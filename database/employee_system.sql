-- ============================================
-- EMPLOYEE SYSTEM DATABASE (runs on pc2 / webserver2)
-- ============================================

CREATE DATABASE IF NOT EXISTS employee_system;
USE employee_system;

CREATE TABLE IF NOT EXISTS employees (
    employee_id INT AUTO_INCREMENT PRIMARY KEY,
    employee_name VARCHAR(100) NOT NULL,
    position VARCHAR(100) DEFAULT NULL,
    department VARCHAR(100) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE employees AUTO_INCREMENT = 1001;

INSERT INTO employees (employee_name, position, department) VALUES
('Ramon Bautista Jr.', 'Front Office Manager', 'Front Office'),
('Kristine Anne Fernandez', 'Guest Relations Officer', 'Front Office'),
('Diego Marasigan', 'Reservations Agent', 'Front Office'),
('Louella Cabrera', 'Executive Housekeeper', 'Housekeeping'),
('Nathaniel Uy', 'Bell Captain', 'Guest Services'),
('Bianca Torralba', 'Night Auditor', 'Front Office'),
('Emmanuel Padilla', 'Concierge', 'Guest Services'),
('Camille Rosales', 'Banquet Coordinator', 'Food & Beverage');
