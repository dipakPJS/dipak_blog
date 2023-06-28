<!-- ====== custom php code ======= -->
<?php

session_start();

define('APP_URL', 'http://localhost/lovedone/');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY lovely site</title>
    <!-- google fonts link -->
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Bruno+Ace+SC&family=Stardos+Stencil:wght@400;700&display=swap"
     rel="stylesheet">
    <!-- bootstrap-5 cdn link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo APP_URL; ?>assets/css/style.css">
</head>
<body>

<!-- navbar section starts -->

<nav class="navbar navbar-expand-lg navbar-light bg-light p-4" id="navbar">
  <div class="container">
    <a class="navbar-brand main-logo" href="<?php echo APP_URL; ?>index.php">


    Dipak_Blog


<div class="logo"><div></div></div></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo APP_URL; ?>index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL; ?>post/blog.php">Blog</a>
        </li>
            <!-- custom php code here -->
        <?php
    if (empty($_SESSION['userName'])) {
        ?>
            
            <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL; ?>auth/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL; ?>auth/register.php">Register</a>
        </li>
<!-- custom php code here -->
            <?php
    } else {
        ?>
              <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL; ?>post/create.php">Create</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="<?php echo APP_URL; ?>auth/logout.php">
          LogOut
          </a>
        </li>
            <?php
    }?>
      
        
      </ul>
    </div>
  </div>
</nav>
<!-- navbar section ends -->