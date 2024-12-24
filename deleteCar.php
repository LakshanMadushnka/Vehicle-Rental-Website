<?php
// Include database connection file
include('connection.php');

// Establish database connection
$conn = Connect();

// Check if car_id parameter is set and not empty
if(isset($_GET['car_id']) && !empty($_GET['car_id'])) {
    // Sanitize the input to prevent SQL injection
    $car_id = mysqli_real_escape_string($conn, $_GET['car_id']);

    // Delete related records from clientcars table
    $delete_clientcars_sql = "DELETE FROM clientcars WHERE car_id = '$car_id'";

    if(mysqli_query($conn, $delete_clientcars_sql)) {
        // After deleting related records, proceed to delete the car record from the cars table
        $delete_car_sql = "DELETE FROM cars WHERE car_id = '$car_id'";

        if(mysqli_query($conn, $delete_car_sql)) {
            // If deletion is successful, redirect back to the page where cars are listed
            header("Location: entercar.php");
            exit();
        } else {
            // If deletion of car record fails, display an error message
            echo "Error deleting car record: " . mysqli_error($conn);
        }
    } else {
        // If deletion of related records fails, display an error message
        echo "Error deleting related clientcars records: " . mysqli_error($conn);
    }
} else {
    // If car_id parameter is not set or empty, redirect back to the page where cars are listed
    header("Location: entercar.php");
    exit();
}

// Close database connection (optional, as PHP automatically closes it at the end of the script execution)
mysqli_close($conn);
?>
