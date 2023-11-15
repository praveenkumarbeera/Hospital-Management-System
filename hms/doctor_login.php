<?php
// Establish a database connection (replace with your actual database credentials)
$host = "localhost";
$username = "root";
$password = "";
$database = "hospital_management";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the AJAX request
    $data = json_decode(file_get_contents("php://input"));
    $username = $data->username;
    $password = $data->password;

    // Query the 'doctors' table to check login credentials
    $stmt = $conn->prepare("SELECT id, username, password FROM doctors WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($doctorId, $doctorUsername, $doctorPassword);
    $stmt->fetch();
    $stmt->close();

    $response = array("success" => false);

    // Compare the plain text password with the stored password (not recommended for security)
    if ($password === $doctorPassword) {
        $response["success"] = true;
        // You can add more data to the response if needed
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

$conn->close();
?>
