<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "hospital_management";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch patient data
$query = "SELECT id, name, email, phone FROM patients"; // Assuming the doctor's ID is 1

$result = $conn->query($query);

if (!$result) {
    die("Query execution failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Doctor's Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightblue;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1, h3 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, Doctor</h1>
        <h3>Here is Your Patients list</h3>

        <table>
            <tr>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
