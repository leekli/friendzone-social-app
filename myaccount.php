<!-- Check the user is authorised to access this page with an active session -->
<?php
    require_once('templates/checkAuth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Assignment 4 submission for CSC-40082 by Lee Kirkham">
    <meta name="keywords" content="HTML, CSS, JavaScript, jQuery, PHP, SQL, Ajax, Keele, Assignment, Computer Science, Web Technologies, Security, Friendzone">
    <meta name="author" content="Lee Kirkham">
    <meta name='subject' content='Computer Science'>
    <link rel="icon" type="image/png" href="images/f-icon.png" />
    <link rel="stylesheet" href="styles/index.css">
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>
    <title>FriendZone - My Account</title>
</head>
<body>
    <main>
    
    <!-- Require in the reusable Navbar -->
    <nav>
    <?php
        require("templates/navbar.php");
    ?>
    </nav>

    <!-- Page Header -->
    <br />
    <header id="homepageHeader">
        <?php
         echo "<h2>Hi, " . $_SESSION['username'] . " 👋</h2>";
        ?>
        <h3>Your Account Settings</h3>
        <small>You are able to edit and update your profile below:</small>
        <br /><br />
    </header>

    <!-- Display current logged in user info on a form -->
    <?php
        include("db/getUserData.php");
    ?>

    <!-- Require in the reusable Footer -->
    <br />
    <?php
        require("templates/footer.php");
    ?>

    </main>
</body>
</html>