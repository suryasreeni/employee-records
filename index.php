<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
        body {
    
        }

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
            right:40px;
            border-radius:3px;
        }

        h3 {
            text-align: center;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            border: none;
           
        }

        th, td {
            padding: 10px;
            text-align: left;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            padding-left:20px;
           
        }

        th {
            
            background-color: #d8e0fb;
            color: rgb(115, 114, 114);
            border-radius:1px;
            }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }
        .col{
            padding-left:10px;
        }
    </style>
    <title>Employee Records</title>
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
<div class="col d-flex justify-content-center mt-0 ml-2">
<div class="card shadow p-3 mb-5 bg-white rounded" style="width: 55rem;">
  <img src="https://i.pinimg.com/564x/e1/b4/42/e1b4421f142a2a4c60801b5860774e59.jpg" style="height:320px" class="card-img-top" alt="...">
  <div class="card-body">
   <h3 style="font-family: Verdana, Geneva, Tahoma, sans-serif;">Employee List</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Joining Date</th>
            <th>Designation</th>
            <th>Actions</th>
        </tr>
        <?php
        include("connection.php");
       $sql = "SELECT * FROM tudo_list";
       $result = mysqli_query($conn, $sql);
       
       if (!$result) {
           die("Query failed: " . mysqli_error($conn));
       }
       
       if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
               echo "<tr>";
               echo "<td>" . $row["emp_id"] . "</td>";
               echo "<td>" . $row["name"] . "</td>";
               echo "<td>" . $row["email"] . "</td>";
               echo "<td>" . $row["age"] . "</td>";
               echo "<td>" . $row["date_of_joining"] . "</td>";
               echo "<td>" . $row["designation"] . "</td>";
               echo '<td><a href="edit.php?emp_id=' . $row["emp_id"] . '"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #d7460c;"></i></a> | <a href="delete.php?emp_id=' . $row["emp_id"] . '"><i class="fa-solid fa-trash fa-lg" style="color: #226ceb;"></i></a></td>';
               echo "</tr>";
           }
       }
       ?>
    </table>
    </div>
</div>
</div>
</div>
<script src="https://kit.fontawesome.com/25e268f749.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>