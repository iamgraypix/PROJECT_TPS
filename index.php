<?php
  session_start();

  //check if the session admin is NOT currently active
  //then bring it to the authorization page.
  if(!isset($_SESSION['admin'])){
    header("Location: home.php");
  }

  //if admin wants to logout
  //then destroy all the sessions and switch it to the authorization page.
  if(isset($_POST['btn-logout'])){
    session_destroy();
    header("Location: home.php");   
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Point Sales System</title>
</head>
<body>

<!-- navbar -->
<?php
  include('includes/inc_navbar.php');
?>
<!-- end of navbar -->

<!-- offcanvas -->

<?php 
  include('includes/inc_offcanvas.php');
?>

<!-- end of offcanvas -->

<!-- content -->
<main class="mt-5 pt-3">  
  <div class="m-4 p-4 shadow rounded-3" style="background-color: white;" id="content">
    <?php
      //default page
      include('includes/inc_dashboard.php');
    ?>
  </div>
  

</main>
<span style="display: none;"id="liveToastBtn"></span>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Message</strong>
      <small>now</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-white">
      Login Successfully. Welcome to Admin Dashboard.
    </div>
  </div>
</div>

<!-- end of content -->
<script src="js/bootstrap.bundle.js"></script>
<script src="js/script.js"></script>

</body>

</html>