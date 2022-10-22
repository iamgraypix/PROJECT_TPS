<div id="products-content">
    <div class="row">
        <div class="col">
            <h1 class="display-4">Products</h1>
        </div>
    </div>

    <!-- Header -->
    <div class="row mt-4 justify-content-around">

        <!-- Product search bar -->
        <div class="col-12 col-md-3">
            <div class="input-group mb-3">
                <input id="search-product-bar" type="text" class="form-control" placeholder="Products's Code" aria-describedby="button-addon2">
                <button id="search-product-btn" class="btn btn-dark" type="button" id="button-addon2">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
         <!-- end of product search bar    -->

        <!-- Add Product Button-->
        <div class="col-6 col-md-3 mb-3">
            <button type="button" class="w-100 btn btn-outline-dark"  data-bs-toggle="modal" data-bs-target="#addProductModal">
                <span>
                    <i class="bi bi-plus-square-fill fs-5 me-2"></i>
                        Product
                </span>
            </button>

            <!-- Add product Modal -->
                <div class="modal fade" id="addProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="needs-validation" novalidate>
                            <div class="modal-body">                        
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <label for="product-name" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="product-name" id="product-name" required>
                                    </div>
                                    <div class="col-6">
                                    <label for="product-code" class="form-label">Product Code</label>
                                        <input type="text" class="form-control" name="product-code" id="product-code" required>
                                    </div>
                                    <div class="col-6">
                                    <label for="product-price" class="form-label">Product Price</label>                                    
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">₱</span>
                                            <input type="number" class="form-control" name="product-price" id="product-price" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="test">
                                </div>

                            </div>
    
                        
                        <div class="modal-footer">
                            <button id="btn-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button id="add-product-submit" type="button" class="btn btn-primary">Add product</button>
                        </div>
                        
                        </form>
                        </div>
                    </div>
                </div>
            <!-- end of product modal -->

        </div>
        <!-- end of add product button -->
         
        <!-- Products Options -->
        <div class="col-6 col-md-2 ">
            <div class="dropdown">
                <button class="w-100 btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>
                    <i class="bi bi-layout-split fs-5 "></i>
                    </span>
                    Sort By
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="layout dropdown-item" id="gallery">
                        <span>
                        <i class="bi bi-grid-3x2 fs-5 me-2"></i>
                        </span>
                        Date
                    </a></li>
                    <li><a class="dropdown-item" id="list">
                        <span><i class="bi bi-list-ul fs-5 me-2"></i></span>
                        List
                    </a></li>
                    
                </ul>
            </div>
        </div>
        <!-- end of layout options -->

    </div>
    <!-- end of header -->

    <hr style="color: #421412;">

    <!-- Products List or gallery -->
    <div id="product-list">
        
            <?php
                include('../actions/products/product-gallery.php');
            ?>

    </div>
    <!-- end of product list -->

</div>
<script src="js/products.js"></script>