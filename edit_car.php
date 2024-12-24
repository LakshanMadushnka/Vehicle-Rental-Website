<?php
// Include database connection file
include('connection.php');

// Establish database connection
$conn = Connect();

// Check if car_id parameter is set and not empty
if(isset($_GET['car_id']) && !empty($_GET['car_id'])) {
    // Sanitize the input to prevent SQL injection
    $car_id = mysqli_real_escape_string($conn, $_GET['car_id']);

    // SQL query to select car details based on car_id
    $sql = "SELECT * FROM cars WHERE car_id = '$car_id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        // Fetch car details
        $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car Details</title>
    <!-- Include any CSS files here -->
</head>
<body>

        <style>
            /* styles.css */

/* Body styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

/* Form container styles */
.container {
    max-width: 500px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Heading styles */
h2 {
    text-align: center;
    margin-bottom: 20px;
}

/* Form input styles */
label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: #007bff;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

        </style>
        
    <h2>Edit Car Details</h2>
    <form class="container" action="update_car.php" method="POST">
        <input type="hidden" name="car_id" value="<?php echo $row['car_id']; ?>">
        <label for="brand">Brand:</label><br>
        <input type="text" id="brand" name="brand" value="<?php echo $row['brand']; ?>"><br>
        <label for="car_name">Model:</label><br>
        <input type="text" id="car_name" name="car_name" value="<?php echo $row['car_name']; ?>"><br>
        <label for="car_nameplate">Number Plate:</label><br>
        <input type="text" id="car_nameplate" name="car_nameplate" value="<?php echo $row['car_nameplate']; ?>"><br>
        <!-- Add more fields as needed -->
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
    } else {
        // If no car found with the specified car_id, redirect back to the page where cars are listed
        header("Location: entercar.php");
        exit();
    }
} else {
    // If car_id parameter is not set or empty, redirect back to the page where cars are listed
    header("Location: entercar.php");
    exit();
}

// Close database connection (optional, as PHP automatically closes it at the end of the script execution)
mysqli_close($conn);
?>
