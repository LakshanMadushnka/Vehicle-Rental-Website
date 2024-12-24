<?php
// Include database connection file
include('connection.php');

// Establish database connection
$conn = Connect();

// Check if form is submitted and all required fields are set
if(isset($_POST['car_id'], $_POST['brand'], $_POST['car_name'], $_POST['car_nameplate'])) {
    // Sanitize input to prevent SQL injection
    $car_id = mysqli_real_escape_string($conn, $_POST['car_id']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $car_name = mysqli_real_escape_string($conn, $_POST['car_name']);
    $car_nameplate = mysqli_real_escape_string($conn, $_POST['car_nameplate']);

    // SQL query to update car details
    $sql = "UPDATE cars SET brand = '$brand', car_name = '$car_name', car_nameplate = '$car_nameplate' WHERE car_id = '$car_id'";

    // Execute the query
    if(mysqli_query($conn, $sql)) {
        // If update is successful, redirect back to the page where cars are listed
        header("Location: entercar.php");
        exit();
    } else {
        // If update fails, display an error message
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    // If form is not submitted or required fields are not set, redirect back to the page where cars are listed
    header("Location: entercar.php");
    exit();
}

// Close database connection (optional, as PHP automatically closes it at the end of the script execution)
mysqli_close($conn);
?>
