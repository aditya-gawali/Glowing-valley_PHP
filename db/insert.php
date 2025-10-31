<?php
header('Content-Type: application/json');

include "./conn.php";

// $conn = new mysqli($host, $username, $password, $database);
$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

// if ($conn->connect_error) {
//     die(json_encode(array("status" => "error", "message" => "Connection failed: " . $conn->connect_error)));
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $inputData = json_decode(file_get_contents('php://input'), true);
    
//     $key1 = $inputData['key1'];
    
//     // Run a MySQL query (example)
//     // $query = "SELECT * FROM your_table WHERE column_name = '$key1'";
//     // $result = $conn->query($query);
    
//     // $data = array();
//     // if ($result->num_rows > 0) {
//     //     while ($row = $result->fetch_assoc()) {
//     //         $data[] = $row; // Collect all rows
//     //     }
//     // }
    
//     // Return the data as JSON
//     echo json_encode(array("status" => "success", "data" => $inputData));
// }

// Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Collect form data
    $fn = $_POST['first_name'];
    $ln = $_POST['last_name'];
    $email = $_POST['email'];
    $mob = $_POST['phone_number'];

    // Here, you can process the data, save it to the database, etc.
    $insert = $conn->prepare("insert into contact(id,fn,ln,email,mob) values (NULL,:fn,:ln,:email,:mob)");

    $insert->execute(array(
        ':fn' => $fn,
        ':ln' => $ln,
        ':email' => $email,
        ':mob' => $mob
    ));
    // Example response back to the frontend
    echo "Form submitted successfully. Name: $fn, Email: $email";
} else {
    echo "Invalid request method.";
}


// $conn->close();
?>
