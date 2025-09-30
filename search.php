<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the search term
    $searchTerm = $_POST["search"] ?? '';

    // Database connection details
    $db_host = "localhost";
    $db_name = "formdata-db";
    $db_username = "root";
    $db_password = ""; // Change if necessary

    // Establish connection
    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    }

    // Prepare SQL statement to prevent SQL injection
    $sql = "SELECT * FROM  booktable WHERE your_column LIKE ?"; // Change your_table and your_column to your actual table/column names
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    // Bind parameters (using '%' for wildcard search)
    $likeTerm = "%" . $searchTerm . "%";
    mysqli_stmt_bind_param($stmt, "s", $likeTerm);

    // Execute statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if any results were returned
    if (mysqli_num_rows($result) > 0) {
        // Output results
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Result: " . $row["your_column"] . "<br>"; // Change your_column to the column you want to display
        }
    } else {
        echo "No results found.";
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
