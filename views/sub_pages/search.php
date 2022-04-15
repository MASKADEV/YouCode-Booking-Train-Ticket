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


<div class="container mb-4">
    <div class="title mt-5 d-flex flex-row align-items-center justify-content-center">
        <h3 class ="me-3 text-uppercase"><?= $_POST['depart_city'] ?></h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
        </svg>
        <h3 class = "ms-3 text-uppercase"><?= $_POST['arrive_city'] ?></h3>
    </div>
    <a href="../booking" class="btn container d-flex flex-row justify-content-evenly align-items-center mt-3" style="border-radius:40px; border : 2px solid blue; max-width:270px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
            <p style = "margin-bottom:0px; align-self-end; color:blue">Search For another Trip</p>
    </a>
</div>
<br>
<br>
    <?php foreach($result as $key=>$value): ?>
      <?php if($value['date'] > date('Y-m-d') && $value['place_number'] > 0 && $value['available'] != 0): ?>
        <div class="container w-75" style= "max-width:600px; margin-bottom:100px;">
            <div class="custom-card shadow d-flex flex-column p-3" style ="border-radius:10px">
                <div class="container d-flex flex-row justify-content-between align-items-center">
                    <div class="d-flex flex-column justify-content-center align-items-start">
                        <p class ="fs-6 fw-light text-center" style ="padding:0px; margin:0px; color:#4A1FA8">Depart</p>
                        <p class ="fs-4 fw-bold" style ="padding:0px; margin:0px; color:#4A1FA8"><?= $value['depart_time'] ?></p>
                        <p class ="fs-6 fw-light" style ="padding:0px; margin:0px; color:#4A1FA8"><?= $value['depart_city'] ?></p>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <p class ="fs-4 fw-bold" style ="padding:0px; margin:0px; color:#4A1FA8"><?= $value['date'] ?></p>
                        <p class ="fs-6 fw-light" style ="padding:0px; margin:0px; color:#4A1FA8">Direct</p>
                    </div>
                    <div class="d-flex flex-column justify-content-between align-items-start">
                        <p class ="fs-6 fw-light" style ="padding:0px; margin:0px; color:#4A1FA8">Arrive</p>
                        <p class ="fs-4 fw-bold" style ="padding:0px; margin:0px; color:#4A1FA8"><?= $value['arrive_time'] ?></p>
                        <p class ="fs-6 fw-light" style ="padding:0px; margin:0px; color:#4A1FA8"><?= $value['arrive_city'] ?></p>
                    </div>
                </div>
                <hr style="height:2px; visibility:visible;"/>
                <div class="container d-flex flex-row justify-content-between align-items-center" style="padding:0px 10px">
                    <div class="d-flex flex-column align-items-start justify-content-center">
                        <p class ="fs-6 fw-normal text-center" style ="padding:0px; margin:0px; color:#4A1FA8"><?= $value['place_number'] ?> Place Available</p>
                        <p class ="fs-6 fw-normal text-end" style ="padding:0px; margin:0px; color:#4A1FA8"><?= $value['price'] ?> MAD</p>
                    </div>
                    <button onclick="booking_now(<?= $value['id']?>)" class ="btn w-25" style ="max-width: 200px;background-color:#4A1FA8; color:white" id ="booking-btn">Book</button>
                </div>
            </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
    </div>
        <div class="bg-primary mt-5 d-flex justify-content-center align-items-center">
            <div class="mt-5 position-absolute popup-container" id="popup-wrapper" >
                <Form action = "http://localhost/Booking-train-ticket/booking/booknow" method = "POST">
                        <h2 class = "title fw-bold">Add Info</h2>
                        <div class="mt-4">
                            <label for="full_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="<?php if(isset($_SESSION["id"])) {echo $_SESSION['full_name'];}else {echo '';} ?>" required>
                          </div>
                        <div class="mt-4">
                            <label for="email" class="form-label">Your Email</label>
                            <input value="<?php if(isset($_SESSION["id"])) {echo $_SESSION['email'];}else {echo '';} ?>" type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mt-4">
                            <label for="phone_number" class="form-label">Your Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                        </div>
                        <div class="mt-4" style ="display: none">
                            <label for="trip_id" class="form-label">Trip</label>
                            <input style="pointer-events: none;" type="tel" class="form-control" id="trip_id" name="trip_id" required>
                        </div>
                        <div class ="d-flex flex-row mt-4">
                        <button class= "btn btn-primary mt-4 d-grid col-5 mx-auto pt-2 pb-2" type="submit">Book Now</button>
                        <a class= "btn btn-danger mt-4 d-grid col-5 mx-auto pt-2 pb-2" id="btn-cancel" >Cancel</a>
                        </div>
                </Form>
            </div>
        </div>
<?php if(empty($result)): ?>
    <div class="title mt-5 text-uppercase">
        <h5>No trip is available</h5>
    </div>
<?php endif ?>
</div>

<!-- Footer -->
<footer class="custom-footer text-center text-lg-start bg-light text-muted w-100">
  <!-- Section: Links  -->
  <section class="pt-2">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>LOGO
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="home" class="text-reset">Home</a>
          </p>
          <p>
            <a href="booking" class="text-reset">Booking</a>
          </p>
          <p>
            <a href="contect" class="text-reset">Contact</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home"></i>Kelaa Sraghna, MA</p>
          <p>
            <i class="fas fa-envelope"></i>
            s.youness@youcode.ma
          </p>
          <p><i class="fas fa-phone"></i> + 212 6 31 86 74 04</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="../home">LOGO.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src ="../public/js/booking.js"></script>
</body>

</html>