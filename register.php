<!-- LI SHUFANG - 19039480 -->
<!DOCTYPE html>
<?php
// php file that contains the common database connection code
include("dbFunctions.php");

// Start new or resume existing session
session_start();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- ADDED-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <style>
            form .error {
                color: #ff0000;
            }

            body {
                font-family: "Lato", sans-serif;
            }

            .main-head{
                height: 150px;
                background: #FFF;

            }

            .sidenav {
                height: 100%;
                background-color: #3FBBC0;
                overflow-x: hidden;
                padding-top: 20px;
            }


            .main {
                padding: 0px 10px;
            }

            @media screen and (max-height: 450px) {
                .sidenav {padding-top: 15px;}
            }

            @media screen and (max-width: 450px) {

                .register-form{
                    margin-top: 10%;
                }
            }

            @media screen and (min-width: 768px){
                .main{
                    margin-left: 40%; 
                }

                .sidenav{
                    width: 40%;
                    position: fixed;
                    z-index: 1;
                    top: 0;
                    left: 0;
                }
                .register-form{
                    margin-top: 40%;
                }
            }

            .register-main-text{
                margin-top: 20%;
                padding: 60px;
                color: #fff;
            }

            .register-main-text h2{
                font-weight: 300;
            }



        </style>
        <title>Register page</title>
    </head>
    <body>
        <?php include 'navigation.php'; ?>

        <div class="sidenav">
            <div class="register-main-text">
                <h2>Yishun Community Hospital <br>Register Page</h2>
                <p>Register from here to log in and access our service.</p>
            </div>
        </div>

        <div class="main">
            <div class="col-md-6 col-sm-12">
                <div class="register-form">

                    <!--Register Form-->
                    <form id="register-form" method="post" action="doRegister.php">

                        <!--Username-->
                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" type="text" class="form-control" placeholder="Username">
                        </div>

                        <!--Password-->
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                            <input type="checkbox" onclick="showPassword()">Show Password
                        </div>

                        <!--Password Showing script -->
                        <script>
                            function showPassword() {
                                var ps = document.getElementById("password");
                                if (ps.type === "password") {
                                    ps.type = "text";
                                } else {
                                    ps.type = "password";
                                }
                            }
                        </script>

                        <!--Height-->
                        <div class="form-group">
                            <label>Height (Meters) </label>  
                            <input name="height" type="number"  step="0.01" min=0 class="form-control" placeholder="Height in meters">
                        </div>

                        <!--Weight-->
                        <div class="form-group">
                            <label>Weight (Kilograms) </label>
                            <input  name="weight" type="number"  step="1"  min=0 class="form-control" placeholder="Weight in kilograms">
                        </div>

                        <!--Birthdate-->
                        <div class="form-group">
                            <label>Birthdate</label>
                            <input type="date" name="dob" class="form-control">
                        </div>


                        <!--Physical Active Level-->
                        <div class="form-group">
                            <label for="sel1">Physical Active Level:</label>
                            <select class="form-control" name="physical_active_level">
                                <option disabled selected value> -- select an option -- </option>
                                <option value="Sedentary">Sedentary</option>
                                <option value="Moderate">Moderate</option>
                                <option value="Active" >Active</option>
                            </select>
                            <br>
                        </div>

                        <!-- Register submit btn-->
                        <button type="submit" class="btn btn-primary" value="register" href="register.php">Register</button>

                        <!-- Reset btn-->
                        <button type="reset" class="btn btn-danger">Reset</button><br>
                        <br> <a href="login.php">Already have an account? Login</a>

                    </form>
                    <!--END Register Form-->

                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>

        <script>
            $(document).ready(function () {

//                alert("test");

                //The submit event occurs when
                //a form is submitted. This
                //event can only be used on
                //<form> elements
                // validation of form
                $("form").validate({

                    // Rules for entered data , and the Regular Expression IS NEEEDED
                    rules: {
                        username: {
                            required: true
                        },

                        password: {
                            required: true,
                            pattern: /^[0-9a-zA-Z]{5,8}$/
                        },

                        height: {
                            required: true,
                            range: [1, 2.71],
                        },
                        weight: {
                            required: true,
                            range: [1, 441],

                        },
                        dob: {
                            required: true
                        },
                        physical_active_level: {
                            required: true
                        },

                    },
                    // Error messages - Not meeting the requirements , and failed to meet the pattern
                    messages: {
                        username: {
                            required: "Username is needed."
                        },

                        password: {
                            required: "Password is needed.",
                            pattern: "Password must be minimum 5 and maximum 8 letters or digits."
                        },

                        height: {
                            required: "Height is needed.",
                            range: "In the Guinness World Records, Robert Wadlow was labelled the tallest man ever with a staggering 2.72 meters as his height. Are your telling me that you are taller than him?"
                        },

                        weight: {
                            required: "Weight is needed.",
                            range: "The Heaviest man ever was Jon Brower Minnoch, who had suffered from obesity since childhood. In September 1976, he measured 1.85 meters tall and weighed 442 kilograms. Are you telling me that your body weight is heavier than him?"

                        },
                        dob: {
                            required: "Birthdate is needed.",
                        },

                        physical_active_level: {
                            required: "Physical Active Level is needed.",
                        },
                    },
                    submitHandler: function () {
                        return true;
                    }
                });

            });
        </script>
        <script src="assets/js/jquery-3.5.1.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    </body>
</html>
<!-- LI SHUFANG - 19039480 -->