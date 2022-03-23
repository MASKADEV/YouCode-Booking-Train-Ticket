<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style/style.css">
    <link rel="stylesheet" href="../public/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>MASKATrip</title>
</head>
<body style="background-color: #f5f6fa">
    <div class="main-section">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark py-3" style ="background-color:#4A1FA9">
          <div class="container">
            <a href="#" class="navbar-brand">MASKATrip</a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navmenu">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item me-4">
                  <a href="home" class="nav-link fw-bold" style = "color: white">Home</a>
                </li>
                <li class="nav-item me-4">
                <a href="<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {echo 'managment';} else {echo 'booking';} ?>" class="nav-link fw-bold" style = "color: white"><?php if ( isset($_SESSION['role']) && $_SESSION['role'] == 1) {echo 'Managment';} else {echo 'Booking';} ?></a>
                </li>
                <li class="nav-item me-4">
                  <a href="<?php if (isset($_SESSION['id'])) {echo 'profile';} else {echo 'signin';} ?>" class="nav-link fw-bold" style = "color: white; <?php if (isset($_SESSION['id'])) {echo 'display:none';} else {echo 'display:flex';} ?>"><?php if (isset($_SESSION['id'])) {echo 'Profile';} else {echo 'Sign in';} ?></a>
                </li>
                <li class="nav-item me-4">
                <a href="<?php if (isset($_SESSION['id'])) {echo 'signout';} else {echo 'signup';} ?>" class="nav-link fw-bold" style = "color: white"><?php if (isset($_SESSION['id'])) {echo 'Sign out';} else {echo 'Sign up';} ?></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

