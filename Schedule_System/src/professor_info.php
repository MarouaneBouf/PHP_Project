<?php
session_start();
include("database.php");

// Check if the user is logged in
if (!isset($_SESSION['NAME'])) {
    header("Location: login.php");
    exit();
}

$professorName = $_SESSION['NAME'];
$sql = "SELECT * FROM professeurs WHERE nom_prf = '$professorName'";
$res_sql = mysqli_fetch_assoc(mysqli_query($conn, $sql));

// Get the courses taught by the professor
$courses_query = "SELECT DISTINCT cours.name FROM enrollment
                  INNER JOIN cours ON enrollment.CourseID = cours.id
                  WHERE enrollment.ProfessorID = '{$res_sql['prf_id']}'";
$courses_result = mysqli_query($conn, $courses_query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Professor Information</title>
    <link rel="stylesheet" href="prof_style.css">
    <link rel="icon" href="./images/metamask.png" />

</head>

<body>
    <h1>Welcome, <?php echo $res_sql['nom_prf'] . " " . $res_sql['prenom_prf']; ?></h1>
    <h2>Department: <?php echo $res_sql['departement_prf']; ?></h2>
    <h3>Courses Taught:</h3>
    <ul>
        <?php while ($course = mysqli_fetch_assoc($courses_result)): ?>
        <li><?php echo $course['name']; ?></li>
        <?php endwhile; ?>
    </ul>
</body>

</html>