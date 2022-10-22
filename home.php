<?php
    
    include('includes/inc_DBConnection.php');

    //check if connected to server
    if($ConnectToServer === FALSE)
        echo "<p>Unable to connect to the server.</p>"."<p>Error code ". mysqli_connect_error().": ". mysqli_connect_error()."</p>";
    else {
        session_start();
        //check if the admin already login correct credentials and did not log out
        if(isset($_SESSION['admin']))
            header("Location: /PROJECT_TPS/");

        // if log in button pressed, then check the credentials
        if(isset($_POST['btn-submit'])){
            
            $uname = $_POST['username'];
            $upass = $_POST['password'];

            $sql = "SELECT * FROM authorization WHERE admin_username = '$uname' AND admin_pass = '$upass'";

            $result = mysqli_query($ConnectToServer, $sql);

            if(mysqli_num_rows($result) === 1){
                $_SESSION['admin'] = TRUE;
                header("Location: /PROJECT_TPS");
            }else{
                echo "
                <span style=\"display: none;\"id=\"liveToastBtn\">
                </span>
                ";
            }

        }

    
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
    <title>Log in</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex align-items-center" style="height: 600px;">
            <div class="col-lg-7 text-white text-center text-lg-start">
                <h1>
                    <img style="width: 450px;" src="img/Logo_transparent.png" class="img-fluid"  alt="">
                </h1>
            </div>
            <div class="col-lg-5">

                <form novalidate id="login-form" autocomplete="off" class="rounded p-3 my-5 needs-validation" style="background-color: #872623;" action="" method="POST">
                    <div class="text-center mb-3">
                        <h2>Authorization</h2>
                    </div>

                    <div class="form-floating mb-3">
                        <input  name="username" type="text" class="form-control" id="username" placeholder="Username" required>
                        <label for="username">Username</label>
                        <div class="invalid-tooltip">
                            Please provide a username.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        <div class="invalid-tooltip">
                            Please provide a password.
                        </div>
                    </div>
                    <div class="text-center">
                        <button style="background-color: #095024;" name="btn-submit" type="submit" class="btn w-50 text-white">Submit</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
    

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <strong class="me-auto">Message</strong>
            <small>now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-white">
                Invalid username or password.
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/validation.js"></script>

        

</body>
</html>
<?php 
    }

?>