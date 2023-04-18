<?php
    // ini_set('display_errors', 0);
    include("database.php");
    session_start();
    $actual_name = $_SESSION['NAME'];
    // If the user clicks the logout button, destroy the session and redirect to the login page
    
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: index.php");
        exit();
<<<<<<< HEAD
    }

?>

<?php
    // Retrieve the student's cours details from the database using a join operation
    $query = "SELECT e.cne, e.nom, e.prenom, e.filiere, c.name AS course_name, c.department AS course_department, p.nom_prf, p.prenom_prf
    FROM etudiants e
    JOIN enrollment en ON e.cne = en.StudentID
    JOIN cours c ON en.CourseID = c.id
    JOIN professeurs p ON en.ProfessorID = p.prf_id
    WHERE e.nom = '{$actual_name}'";
    $result = mysqli_query($conn, $query);
=======
    }

?>

<?php
    // Retrieve the student's cours details from the database using a join operation
    $query = "SELECT e.cne, e.nom, e.prenom, e.filiere, c.name AS course_name, c.department AS course_department, p.nom_prf, p.prenom_prf
    FROM etudiants e
    JOIN enrollment en ON e.cne = en.StudentID
    JOIN cours c ON en.CourseID = c.id
    JOIN professeurs p ON en.ProfessorID = p.prf_id
    WHERE e.nom = '{$actual_name}'";
    $result = mysqli_query($conn, $query);

    // Store the course details in an array
    $courses = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row;
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <style>
    .container {
        display: flex;
        overflow: hidden;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    h1 {
        color: #333333;
        text-align: center;
        margin-top: 50px;
    }

    table {
        border-collapse: collapse;
        width: 80%;
        margin: auto;
        margin-top: 30px;
        margin-bottom: 50px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    th,
    td {
        text-align: left;
        padding: 15px;
        border-bottom: 1px solid #dddddd;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .welcome {
        font-size: 28px;
        text-align: center;
        margin-top: 80px;
    }

    button {
        background-color: #EDEDED;
        border-radius: 10px;
        border: none;
        color: #333;
        font-size: 1.2em;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 20px auto;
        transition: background-color 0.3s ease-in-out;
        cursor: pointer;
    }
>>>>>>> 744737191baa7d1136bc7b9fb88d3561a06ea1e4

    button:hover {
        background-color: #ccc;
    }
<<<<<<< HEAD
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="./etd_style.css">
=======
    </style>
>>>>>>> 744737191baa7d1136bc7b9fb88d3561a06ea1e4
    <link rel="icon" href="./images/metamask.png" />
</head>

<body>
    <div class="container">
        <h1>Student Course Details</h1>
        <p class="welcome">Welcome, <?php echo $actual_name?>!</p>
        <table>
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Department Name</th>
                    <th>Professor Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course) { ?>
                <tr>
                    <td><?php echo $course['course_name']; ?></td>
                    <td><?php echo $course['course_department']; ?></td>
                    <td><?php echo $course['nom_prf'] . " " . $course['prenom_prf']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
<<<<<<< HEAD
        <div class="sub_container">
            <form method="post">
                <button name="logout" onclick="location.href='index.php'">Home!</button>
            </form>
            <!-- Button to register for other courses -->
            <button id="register-button" onclick="toggleRegister()">Register for Other Courses</button>

            <!-- Div for selecting courses to register -->
            <div id="register-div" style="display:none;">
                <h3>Select a Course to Register</h3>
                <form method="post" action="register.php">
                    <select name="course">
                        <?php
                        // Retrieve all courses from the database
                        $query = "SELECT * FROM cours";
                        $result = mysqli_query($conn, $query);

                        // Display each course as an option in the select input
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='".$row['id']."'>".$row['name']."</option>";
                        }
                    ?>
                    </select>
                    <input type="submit" value="Register">
                </form>
            </div>
        </div>

    </div>
    <br><br>

</body>

</html>


<script>
function toggleRegister() {
    var registerDiv = document.getElementById("register-div");
    if (registerDiv.style.display === "none") {
        registerDiv.style.display = "block";
    } else {
        registerDiv.style.display = "none";
    }
}
</script>
=======
        <form method="post">
            <button name="logout" onclick="location.href='index.php'">Home!</button>
        </form>
    </div>
</body>

</html>
>>>>>>> 744737191baa7d1136bc7b9fb88d3561a06ea1e4
