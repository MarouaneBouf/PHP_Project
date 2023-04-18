<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="./images/metamask.png" />
    <script src="./script.js"></script>
    <title>Login Page</title>
</head>

<body>
    <div id="container">
        <div id="left-section">
            <img src="./images/Design-TIME1.jpg" alt="Photograph" width="100%" />
        </div>
        <div id="right-section">
            <h1 style="font-size: 29px">Welcome Back!</h1>
            <p style="font-size: 13px; color: rgb(160, 160, 160)">
                Please log in to continue.
            </p>
            <div id="inputs">
                <form action="" method="post">
                    <input class="input" type="text" placeholder="Name" name="NAME" autocomplete="off" />
                    <input name="FILIERE" class="input" type="text" placeholder="Filiere" autocomplete="off" />
                    <input name="PASS" class="input" type="password" placeholder="Password" autocomplete="off" />

            </div>
            <div id="btns">
                <button id="new_acc" type="submit">Login here</button>
                <button id="google">
                    <div id="google_div">
                        <img src="./images/Google Logo.png" alt="Google Logo" width="7%" />
                        <p>Login with Google</p>
                    </div>
                </button>
                <p id="last_question">
                    Don't have an account? <span id="span_log"><a href="./home.php">Sign up</a></span>
                </p>
            </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php
    session_start();
    ini_set('display_errors', 0);
    $boolean_res = false;
    $login_name = $_POST['NAME'];
    $query = "SELECT nom FROM etudiants";

    $res = mysqli_query($conn, $query);
    $arr = mysqli_fetch_all($res);
    foreach($arr as $name){
        if($name[0] === $login_name){
            $boolean_res = true;
        }
    }
    if($boolean_res){
        // $message = "Welcome Back, {$login_name}!";
        $_SESSION['login_name'] = $login_name;
        header("Location: etudiant.php");
        // $js_code = "alert('$message');";
    }
    else if($login_name!="" && !$boolean_res){
        header("Location: error.html");
    }
?>