<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        
h2 {
            text-align: center;
        }

        form {
            width: 60%;
            margin: 0 auto;
            font-family:verdana;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="number"],
        form input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius:3px;
            border: 3px solid #d8e0fb;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
            
        }

        form button {
            position: relative;
            background-color: rgb(86, 81, 232);
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            right:10px;
            border-radius:3px;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
<div class="row">
<div class="col d-flex justify-content-center mt-4 ml-2">
<div class="card shadow p-3 mb-5 bg-white rounded " style="width: 30rem;">
  <img src="https://i.pinimg.com/564x/b9/77/14/b977148904f4906f4eac25f6f49e3bf5.jpg" class="card-img-top" alt="...">
  <div class="card-body">
  <h3 style="font-family:Verdana, Geneva, Tahoma, sans-serif; margin-bottom:30px;">Employee Records</h3>
    <form action="insert.php" method="post" justify-content="center">
        <input type="text" name="id" placeholder="Employee ID" required><br>
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="number" name="age" placeholder="Age" required><br>
        <input type="date" name="date_of_joining" placeholder="Date of Joining" required><br>
        <input type="text" name="designation" placeholder="Designation" required><br>
       <button type="submit"style="margin-left:100px;">Add</button>
    </form>
</div>
</div>
</div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["emp_id"])) {
    include("connection.php");

    $employee_id = $_GET["emp_id"];

    // Retrieve the employee details based on emp_id
    $sql = "SELECT * FROM tudo_list WHERE emp_id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $employee_id);
    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        // Pre-fill the form fields with existing data
        $name = $row["name"];
        $email = $row["email"];
        $age = $row["age"];
        $date_of_joining = $row["date_of_joining"];
        $designation = $row["designation"];
    } else {
        die("Employee not found.");
    }
    mysqli_stmt_close($stmt);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("connection.php");

    $employee_id = $_POST["emp_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $date_of_joining = $_POST["date_of_joining"];
    $designation = $_POST["designation"];

    // Update the employee record in the database
    $sql = "UPDATE tudo_list SET name = ?, email = ?, age = ?, date_of_joining = ?, designation = ? WHERE emp_id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssisi", $name, $email, $age, $date_of_joining, $designation, $employee_id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
    } else {
        die("Update failed: " . mysqli_error($conn));
    }
    mysqli_stmt_close($stmt);
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>