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
    <script type="text/javascript" src="dist/pwstrength-bootstrap.min.js" defer></script>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>
    <title>FriendZone - Register</title>

    <!-- Password Strength tool activation -->
    <script>
        $(document).ready(function () {
            $(':password').pwstrength();
        });
    </script>

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
    <header id="homepageHeader">
        <br />
        <h2>Welcome to FriendZone 👋</h2>
        <small>Please complete the form below to set up an account.</small>
    </header>
    <br />

    <!-- Registration form -->
    <section id="inputForm" style="background-color:#e3f2fd;">
    <h4>Registration Form:</h4>
    <form action='db/insertUser.php' method='POST'>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name='email' required>
            <label for="floatingInput">Email address</label>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingUsername" placeholder="Username A" name='username' required>
            <label for="floatingUsername">Username</label>
            <div id="userHelp" class="form-text">Create your own username, this is how you will identify on FriendZone.</div>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name='password' required>
            <label for="floatingPassword">Password</label>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">Must be 8-20 characters long.</span>
            </div>
        </div>
        <br>
        <center><button type="submit" class="btn btn-secondary btn-lg" id="registerButton">Register</button></center>
        <br />
    </form>
    </section>

    <br />
    <!-- Require in the reusable Footer -->
    <?php
        require("templates/footer.php");
    ?>

    </main>
</body>
</html>