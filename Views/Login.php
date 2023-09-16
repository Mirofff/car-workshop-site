<?php
$this->layout('Template', ['title' => "Sign In"])
?>

<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>

                                <form method="post" action="/signin-action">
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="form2Example1" name="user_email" class="form-control"/>
                                        <label class="form-label" for="form2Example1">Email address</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form2Example2" name="user_password"
                                               class="form-control"/>
                                        <label class="form-label" for="form2Example2">Password</label>
                                    </div>

                                    <!-- 2 column grid layout for inline styling -->
                                    <div class="row mb-4">
                                        <div class="col d-flex justify-content-center">
                                            <!-- Checkbox -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="form2Example31" checked/>
                                                <label class="form-check-label" for="form2Example31"> Remember
                                                    me </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <!-- Simple link -->
                                            <a href="#!">Forgot password?</a>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                                    <!-- Register buttons -->
                                    <div class="text-center">
                                        <p>Not a member? <a href="/signup">Register</a></p>
                                        <p>or sign up with:</p>
                                        <button type="button" class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-facebook-f"></i>
                                        </button>

                                        <button type="button" class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-google"></i>
                                        </button>

                                        <button type="button" class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-twitter"></i>
                                        </button>

                                        <button type="button" class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-github"></i>
                                        </button>
                                    </div>
                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="assets/img/logo.png" class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
