<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #421412;">
  <div class="container-fluid">
    <!-- offcanvas trigger -->
    <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    <i style="color: #BCB329;" class="bi bi-list fs-3 "></i>
    </button>
    <!-- end of offcanvas trigger -->
    
    <a style="color: #BCB329;" class="navbar-brand fw-bold text-uppercase me-auto" href="#">
      Lugaw Ni Onoy
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i style="color: #BCB329;" class="bi bi-menu-down fs-3 "></i>
  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
        <li class="nav-item me-2">
          <a style="color: #BCB329;" href="#" class="nav-link">
            <i class="bi bi-person-fill fs-5"></i>
            Welcome Admin
          </a>
        </li>
        <li class="nav-item me-2">
          <a style="color: #BCB329;" class="nav-link">
            <i class="bi bi-calendar3 fs-5"></i>
            <?php echo date("F jS, Y (l)"); ?>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a style="color: #BCB329;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill fs-5"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="#">
                <i class="bi bi-file-earmark-lock fs-5"></i>
              Change Password
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="bi bi-card-list fs-5"></i>
                Login History
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="" method="post">
                <button name="btn-logout" type="submit" class="dropdown-item " href="#">
                  <i class="bi bi-power fs-5"></i>
                  Logout
                </button> 
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>