<div style="background-color: #095024; " class="offcanvas offcanvas-start sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

  <div class="offcanvas-body p-0">
    <nav class="navbar-dark">
      <ul class="navbar-nav">
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3">
            CORE
          </div>
        </li>
        <li>
          <a href="index.php" id="dashboard" class="nav-link px-3 active" onclick="show('dashboard');">
            <span class="me-2 fs-5">
              <i class="bi bi-speedometer2"></i>
            </span>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="my-1">
          <hr class="dropdown-divider">
        </li>
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3">
            Interface
          </div>
        </li>
        <li>
          <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <span class="me-2">
              <i class="bi bi-shop fs-5"></i>
            </span>
            <span>Store</span>
            <span class="right-icon ms-auto">
              <i class="bi bi-chevron-down"></i>
            </span>
          </a>
          <div class="collapse" id="collapseExample">
            <div>
              <ul class="navbar-nav ps-3">
                <li>
                  <a id="products" class="nav-link px-3" onclick="show('products');">
                    <span class="me-2">
                      <i class="bi bi-file-text fs-5"></i>
                    </span>
                    <span>Products</span>
                  </a>
                </li>
                <li>
                  <a id="order" class="nav-link px-3" onclick="show('order');">
                    <span class="me-2">
                      <i class="bi bi-cart-plus fs-5"></i>
                    </span>
                    <span>Order</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li>
          <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#supply-collp" role="button" aria-expanded="false" aria-controls="collapseExample">
            <span class="me-2">
              <i class="bi bi-box-seam fs-5"></i>
            </span>
            <span>Supply</span>
            <span class="right-icon ms-auto">
              <i class="bi bi-chevron-down"></i>
            </span>
          </a>
          <div class="collapse" id="supply-collp">
            <div>
              <ul class="navbar-nav ps-3">
                <li>
                  <a id="supplier" class="nav-link px-3" onclick="show('supplier');">
                    <span class="me-2">
                      <i class="bi bi-list-columns fs-5"></i>
                    </span>
                    <span>Registered Items</span>
                  </a>
                </li>
                <li>
                  <a id="stock" class="nav-link px-3" onclick="show('stock');">
                    <span class="me-2">
                      <i class="bi bi-cast fs-5"></i>
                    </span>
                    <span>Stock Monitor</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li class="my-4">
          <hr class="dropdown-divider">
        </li>
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3">
            Reports
          </div>
        </li>
        <li>
          <a id="sales" class="nav-link px-3" onclick="show('sales');">
            <span class="me-2">
              <i class="bi bi-cart fs-5"></i>
            </span>
            <span>Sales</span>
          </a>
        </li>
        <!-- <li>
          <a id="sales-report" class="nav-link px-3" onclick="show('sales-report');">
            <span class="me-2">
              <i class="bi bi-graph-up fs-5"></i>
            </span>
            <span>Sales Report</span>
          </a>
        </li> -->
        <li class="my-4">
          <hr class="dropdown-divider">
        </li>
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3">
            Time
          </div>
        </li>
        <li>
          <a href="#" class="nav-link px-3 fs-4 fw-bold" style="color: #421412;">
            <span class="me-2">
              <i class="bi bi-clock"></i>
            </span>
            <span id="time"></span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>