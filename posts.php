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
    <script type="text/javascript" src="scripts/posts.js" defer></script>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>
    <title>FriendZone - Home Feed</title>
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
        <h3>🏡 Your Home Feed</h3>
    </header>

    <!-- Form to submit a new post -->
    <br />
    <section style="background-color:#e3f2fd; border-style: solid; width: 95vw; margin: auto;">
    <h4>✍️ Write a Post:</h4>
    <?php echo '<form action="db/insertPost.php?username=' . $_SESSION['username'] . '" method="POST" id="postForm">'; ?>
    <center>
        <div class="mb-3">
            <label for="userspost" class="form-label">What do you want to tell the world? 💬</label>
            <textarea class="form-control" id="userspost" rows="3" style="width: 95%; margin: auto;" name="postbody" required></textarea>
            <div id="postHelp" class="form-text">Your post can be a maximum of 280 characters.</div>
            <p id="postFormError"></p>
            <center><button type="submit" class="btn btn-secondary btn-sm" id="postButton">Post</button></center>
        </div>
    </center>
    </form>
    </section>
    <br />

    <!-- Display all posts -->
    <?php
        include("db/getAllPosts.php");
    ?>

    <!-- Require in the reusable Footer -->
    <?php
        require("templates/footer.php");
    ?>

    </main>
</body>
</html>