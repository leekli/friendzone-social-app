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
    <link rel="stylesheet" href="styles/error.css">
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>
    <title>FriendZone - Error</title>
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
    <header id="errorHeader">
        <?php
            $error_msg = $_GET['error'];
            if ($error_msg == "userexists") {
                echo "<h2>❌ That user already exists, <a href='register.php'>try again.</a></h2>";
            } elseif ($error_msg == "notauth") {
                echo "<h2>❌ You are not logged in or authorised to access this please, please <a href='index.php'>Login.</a></h2>";
            } elseif ($error_msg == "wronglogin") {
                echo "<h2>❌ Your login was unsuccessful, please <a href='index.php'>try again.</a></h2>";
            } else {
                echo "<h2>❌ Oh no...</h2>";
            }
        ?>
    </header>
    <br />

    <!-- Error Message -->
    <section id="errorMsg">
    <div class="alert alert-danger" role="alert">
        There was an issue...
        <br /><br />
        <?php echo "<a href=\"javascript:history.go(-1)\">Click here to go back to previous page.</a>"; ?>
        <br /><br />
        <a href="posts.php">Click here to go back to the Home Feed.</a>
        <br /><br />
        <a href="index.php">Click here to go back to the Login Page.</a>
    </div>
    </section>

    <!-- Require in the reusable Footer -->
    <?php
        require("templates/footer.php");
    ?>

    </main>
</body>
</html>