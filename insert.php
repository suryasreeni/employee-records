<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("connection.php");
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $date_of_joining = $_POST["date_of_joining"];
    $designation = $_POST["designation"];

    // Check if "id" is set, and use it if provided
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $sql = "INSERT INTO tudo_list (emp_id, name, email, age, date_of_joining, designation) VALUES ('$id', '$name', '$email', '$age', '$date_of_joining', '$designation')";
    } else {
        // If "id" is not provided, let the database handle auto-increment
        $sql = "INSERT INTO tudo_list (name, email, age, date_of_joining, designation) VALUES ('$name', '$email', '$age', '$date_of_joining', '$designation')";
    }
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        die("Insertion failed: " . mysqli_error($conn));
    }
}

?>