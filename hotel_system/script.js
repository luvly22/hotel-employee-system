// script.js — Hotel System frontend logic

// Change this to wherever your Employee System (pc2/webserver2) is actually running.
// Examples: "http://localhost:8080/employee_system/get_employees.php"
//           "http://192.168.1.20/employee_system/get_employees.php"
const EMPLOYEE_API_URL = "http://localhost:8080/employee_system/get_employees.php";

const employeeSelect = document.getElementById("employee_name");
const employeeIdField = document.getElementById("employee_id");
const messageBox = document.getElementById("message");

// STEP A: Fetch employees from the Employee System and populate the dropdown
async function loadEmployees() {
    try {
        const response = await fetch(EMPLOYEE_API_URL);
        const employees = await response.json();

        employeeSelect.innerHTML = '<option value="">-- Select employee --</option>';

        employees.forEach(emp => {
            const option = document.createElement("option");
            option.value = emp.employee_name;
            option.textContent = `${emp.employee_name} (${emp.position ?? "N/A"})`;
            option.dataset.employeeId = emp.employee_id;
            employeeSelect.appendChild(option);
        });
    } catch (err) {
        employeeSelect.innerHTML = '<option value="">-- Failed to load employees --</option>';
        console.error("Could not fetch employees:", err);
    }
}

// When the user picks a name, remember the matching employee_id in the hidden field
employeeSelect.addEventListener("change", () => {
    const selectedOption = employeeSelect.options[employeeSelect.selectedIndex];
    employeeIdField.value = selectedOption.dataset.employeeId || "";
});

// STEP B: Submit the reservation to the Hotel System's own backend (create_reservation.php)
document.getElementById("reservationForm").addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target);

    try {
        const response = await fetch("create_reservation.php", {
            method: "POST",
            body: formData
        });
        const result = await response.json();

        messageBox.textContent = result.message;
        messageBox.style.color = result.success ? "green" : "red";

        if (result.success) e.target.reset();
    } catch (err) {
        messageBox.textContent = "Error submitting reservation.";
        messageBox.style.color = "red";
        console.error(err);
    }
});

loadEmployees();
