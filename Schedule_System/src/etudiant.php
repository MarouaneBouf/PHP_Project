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
    <link rel="stylesheet" href="./etd_style.css">
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