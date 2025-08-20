<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houzz Hunt - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap');

        .login-wrapper {
            background-color: #0d2d2b;
            color: #d1d1c9;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        span.whiteYellow {
            color: #edbb68;
            font-family: "Lora", serif !important;
            font-style: italic;
            background: linear-gradient(97.08deg, #fff 0%, #edbb68 55.06%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 300;
        }

        /* .login-wrapper h1 {
            color: #d4a83a;
            font-weight: bold;
        } */

        .login-logo {
            width: 200px;
            position: relative;
            right: 20px;
            margin-bottom: 20px;
        }

        .login-wrapper h2 {
            margin-bottom: 0px;
            font-size: 40px;
            font-weight: 300;
            line-height: 1.3;
            color: #fff;
            font-family: "Lora", serif !important;
            font-style: italic;
        }

        .login-wrapper p {
            margin: 0;
            color: #f9e9b8b3;
        }

        .login-wrapper .line {
            width: 12%;
            height: 3px;
            background-color: #d4a83a;
            margin: 10px 0;
        }

        .login-wrapper .feature-icon img {
            width: 36px;
            height: 36px;
        }

        .login-box {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 30px;
        }

        .login-box h3 {
            font-weight: 400;
            margin-bottom: 5px;
            color: #111;
            text-align: center;
        }

        .login-form .form-group label {
            display: inline-block;
            margin-bottom: 5px;
            color: #111;
        }

        .login-form .form-group input {
            box-shadow: none;
            border: 1px #004a44 solid;
        }

        .login-box p {
            color: #6a7c7c;
            text-align: center;
            margin-bottom: 20px;
        }

        .login-box .form-control {
            border-radius: 8px;
        }

        .login-box button {
            background-color: #0d2d2b;
            border: none;
            border-radius: 8px;
            width: 100%;
            padding: 10px;
            color: #fff;
        }

        .login-box button:hover {
            background-color: #154442;
        }

        .login-box .forgot {
            color: #eebd2b;
            font-size: 14px;
            font-weight: 500;
        }

        .login-box .forgot:hover {
            text-decoration: underline;
        }

        .login-box .contact {
            color: #f0c22b;
            text-decoration: none;
            font-weight: 600;
        }

        .login-box .contact:hover {
            text-decoration: underline;
        }

        .footer-text {
            font-size: 13px;
            color: #f9e9b8b3;
            margin-top: 30px;
            text-align: center;
        }

        .text-golden {
            color: #f9e9b8b3;
        }

        .form-group .form-check label {
            color: #6a7c7c;
        }

        small {
            color: #6a7c7c;
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Section -->
                <div class="col-lg-7 d-flex flex-column justify-content-center">
                    <a href="index.php"><img src="assets/images/logo/houzz-hun-golden-logo.png" alt=""
                            class="login-logo"></a>
                    <p>REAL ESTATE</p>
                    <div class="line"></div>
                    <h2><span class="whiteYellow">Channel Partner Portal</span></h2>
                    <p>Your exclusive gateway to Dubai’s premium real estate opportunities.</p>
                    <p class="mt-4">Login to manage your luxury property listings, track client relationships, and grow
                        your business with real-time insights</p>

                    <div class="row mt-5">
                        <div class="col-4">
                            <div class="feature-icon mb-2">
                                <img src="assets/images/icon/listing.png" alt="Premium Listings">
                            </div>
                            <strong class="text-golden">Premium Listings</strong>
                            <p class="m-0">Showcase luxury properties</p>
                        </div>
                        <div class="col-4">
                            <div class="feature-icon mb-2">
                                <img src="assets/images/icon/client-management.png" alt="Client Management">
                            </div>
                            <strong class="text-golden">Client Management</strong>
                            <p class="m-0">Track leads & relationships</p>
                        </div>
                        <div class="col-4">
                            <div class="feature-icon mb-2">
                                <img src="assets/images/icon/analytics.png" alt="Analytics">
                            </div>
                            <strong class="text-golden">Analytics</strong>
                            <p class="m-0">Performance insights</p>
                        </div>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="col-lg-4  align-items-center">
                    <div class="login-box w-100">
                        <h3>Welcome Back</h3>
                        <p>Sign in to your partner account</p>

                        <!-- Login Form -->
                        <form class="login-form" action="login.php" method="POST">
                            <div class="mb-3 form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="partner@example.com" required>
                            </div>

                            <div class="mb-3 form-group position-relative">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                <!-- Custom Toggle Icon -->
                                <span id="togglePassword"
                                    style="position:absolute; right:15px; top:55%; cursor:pointer; font-size:14px; user-select:none;">
                                    👁️
                                </span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check form-group">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <a href="#" class="forgot">Forgot password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Sign In to Portal</button>
                        </form>

                        <script>
                            // Password toggle functionality
                            const togglePassword = document.querySelector("#togglePassword");
                            const password = document.querySelector("#password");

                            togglePassword.addEventListener("click", function() {
                                const type = password.getAttribute("type") === "password" ? "text" : "password";
                                password.setAttribute("type", type);

                                // Change icon between open-eye and closed-eye
                                this.textContent = type === "password" ? "👁️" : "🙈";
                            });
                        </script>



                        <div class="text-center mt-3">
                            <small>Need access? <a href="#" class="contact">Contact Admin</a></small>
                        </div>
                    </div>
                    <div class="footer-text">
                        Powered by Houzz Hunt Real Estate Technology
                    </div>
                </div>
            </div>


        </div>
    </div>
</body>

</html>