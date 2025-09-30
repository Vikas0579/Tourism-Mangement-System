<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $travelerName = $_POST["travelName"] ?? '';
    $age = $_POST["age"] ?? 0;
    $gender = $_POST["gender"] ?? '';
    $email = $_POST["email"] ?? '';
    $phone = $_POST["phone"] ?? '';
    $vehicle = $_POST["vehicle"] ?? '';
    $cartype = $_POST["car-type"] ?? '';
    $bustype = $_POST["bus-type"] ?? '';
    $flighttype = $_POST["flight-type"] ?? '';
    $biketype = $_POST["bike-type"] ?? '';
    $traintype = $_POST["train-type"] ?? '';
    $date = $_POST['date'] ?? '';

    // Check if terms are accepted
    $checked = filter_input(INPUT_POST, "checked", FILTER_VALIDATE_BOOL);
    if (!$checked) {
        die("Terms must be accepted");
    }

    // Database connection
    $db_host = "localhost";
    $db_name = "formdata-db";
    $db_username = "root";
    $db_password = "";

    // Establish connection
    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    }

    // Prepare SQL statement
    $sql = "INSERT INTO booktable (travelername, age, email, phone, gender, vechiletype, cartype, bustype ,flighttype ,biketype, traintype, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    //binding the data with server
    mysqli_stmt_bind_param(
        $stmt, 
        "sisissssssss",
        $travelerName, 
        $age, 
        $email, 
        $phone, 
        $gender, 
        $vehicle, 
        $cartype, 
        $bustype, 
        $flighttype, 
        $biketype, 
        $traintype, 
        $date
    );

    // Execute statement and handle result
    if (mysqli_stmt_execute($stmt)) {
        // Record saved successfully, redirect to bookNow.html
        header("Location: http://localhost/travelwebsite/index.html");
        exit(); // Make sure to exit after the redirect
    } else {
        echo "Error saving record: " . mysqli_error($conn);
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
