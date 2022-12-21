<?php
    // Navbar.php
    // This script contains the HTML code to display a navigation bar

    echo '<nav class="navbar" style="background-color: #e3f2fd;">';
    echo '<div class="container-fluid">';
    echo '<a class="navbar-brand" href="index.php">';
    session_start();
    if ($_SESSION['id'] == session_id() || isset($_SESSION['loggedin']) || $_SESSION['loggedin']) {      
      echo '<img src="images/f-icon.png" alt="The FriendZone Logo" width="40" height="40" class="d-inline-block align-text-top">
      FriendZone | <small>👋 ' . $_SESSION['username'] . '</small></a>';
    } elseif ($_SESSION['id'] != session_id() || !isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
      echo '<img src="images/f-icon.png" alt="The FriendZone Logo" width="40" height="40" class="d-inline-block align-text-top">
      FriendZone
    </a>';
    }
    echo '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">';
    echo '<span class="navbar-toggler-icon"></span>';
    echo '</button>';
    echo '<div class="collapse navbar-collapse" id="navbarNavAltMarkup">';
    echo '<div class="navbar-nav">';
    echo '<a class="nav-link active" aria-current="page" href="posts.php">Home Feed</a>';
    echo '<a class="nav-link" href="users.php">Users List</a>';
    echo '<a class="nav-link" href="myaccount.php">My Account Settings</a>';
    if ($_SESSION['id'] == session_id() || isset($_SESSION['loggedin']) || $_SESSION['loggedin']) {      
      echo '<a class="nav-link" href="logout.php">Logout</a>';
    } elseif ($_SESSION['id'] != session_id() || !isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
      echo '<a class="nav-link" href="index.php">Login</a>';
    }
    echo '</div>';
    echo '</div>';
    echo '</nav>';
?>