<?php
// Establish a database connection (you should put your actual database credentials here)
$host = "localhost"; // Change to your database host
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$database = "hospital_management"; // Change to your database name

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the AJAX request
$data = json_decode(file_get_contents("php://input"));
$name = $data->name;
$email = $data->email;
$phone = $data->phone;

// Validate and insert data into the 'patients' table
$stmt = $conn->prepare("INSERT INTO patients (name, email, phone) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $phone);

$response = array("success" => false);

if ($stmt->execute()) {
    $response["success"] = true;
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
