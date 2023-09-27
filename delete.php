<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["emp_id"])) {
    include("connection.php");

    $employee_id = $_GET["emp_id"];

    // Delete the employee record from the database
    $sql = "DELETE FROM tudo_list WHERE emp_id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $employee_id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
    } else {
        die("Deletion failed: " . mysqli_error($conn));
    }
    mysqli_stmt_close($stmt);
}
?>