<?php require_once 'components/header.php' ?>
    <!-- Booking System -->
    <div class="container d-flex flex-column align-items-center">
        <div class="title mt-5">
            <h1>Sign up</h1>
        </div>
        <div class="auth-section">
                <div class="left-auth-container">
                        <img src="public/assets/login_thumb.svg" alt="">
                </div>
                <div class="right-auth-container">
                    <Form class ="auth-form" action="http://172.16.139.9/Booking_Train/signup/signup_function" method = "POST">
                        <div class="mb-3 w-100">
                            <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                            <input type="email" name='email' class="form-control w-100" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="mb-3 w-100">
                            <label for="exampleFormControlInput1" class="form-label">Full name</label>
                            <input type="name" name='full_name' class="form-control w-100" id="exampleFormControlInput1" placeholder="Full nmae">
                        </div>
                        <div class="mb-3 w-100">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" name= 'password' class="form-control w-100" id="exampleFormControlInput1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary pt-2 pb-2 ps-4 pe-4 mt-3">Sign up</button>
                    </Form>                    
                </div>
        </div>
    </div>
<?php require_once 'components/footer.php' ?>