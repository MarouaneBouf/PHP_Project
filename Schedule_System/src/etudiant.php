<?php
    // ini_set('display_errors', 0);
    include("database.php");
    session_start();
    $actual_name = $_SESSION['login_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/metamask.png" />
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
    <title>Home</title>
</head>

<body>
    <?php

    // Retrieve the student's cours details from the database using a join operation
    $query = "SELECT *
                FROM cours JOIN enrollment ON
                enrollment.CourseID = cours.id
                ";
    $result = mysqli_query($conn, $query);

    // Store the course details in an array
    $courses = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row;
    }
    ?>
    <h1>Student Course Details</h1>
    <table>
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Professor Name</th>
                <th>Department Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $cours) { ?>
            <tr>
                <td><?php echo $cours['name']; ?></td>
                <td><?php echo $cours['departement']; ?></td>
                <td><?php echo $cours['prenom']; ?></td>
                <td><?php echo $cours['filiere']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>