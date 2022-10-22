<?php include('../actions/supply/getAllRegis.php'); ?>

<div>
    <h1 class="display-5 text-center">Products</h1>


    <div class="row mt-4 justify-content-around">
        <div class="col-12 col-md-4">
            <div class="input-group mb-2">
                <input id="search-product-bar" type="text" class="form-control " placeholder="Item Name" aria-describedby="button-addon2">
                <button id="search-product-btn" class="btn btn-dark" type="button" id="button-addon2">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <button type="button" class="w-100 btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#add-product-modal">
                <span>
                    <i class="bi bi-plus-square-fill fs-5 me-2"></i>
                    Add Product
                </span>
            </button>
        </div>
    </div>

    <!-- Add Item Modal -->
    <div class="modal fade" id="add-product-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                <form class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Date</span>
                            <input type="date" class="form-control" id="date">
                        </div>

                        <div class="row">
                            <div class="col-9 mb-3">
                                <label for="inputState" class="form-label">Select Product</label>
                                <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <?php foreach ($allSupply as $item) : ?>

                                        <option value="<?php echo $item['name'] . "/" . $item['lis_price'] . "/" . $item['ret_price']; ?>"><?php echo $item['name']; ?></option>

                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="col-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity">
                            </div>
                            <div class="col-6">
                                <label for="listing-price" class="form-label">Listing Price</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">₱</span>
                                    <input type="number" class="form-control" name="listing-price" id="listing-price" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="retail-price" class="form-label">Retail Price</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">₱</span>
                                    <input type="number" class="form-control" name="retail-price" id="retail-price" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="tot-list-price" class="form-label">Total Listing Price</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">₱</span>
                                    <input type="number" class="form-control" name="tot-list-price" id="tot-list-price" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="tot-retail-price" class="form-label">Total Retail Price</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">₱</span>
                                    <input type="number" class="form-control" name="tot-retail-price" id="tot-retail-price" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3" id="test">
                        </div>

                    </div>


                    <div class="modal-footer">
                        <button id="btn-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button id="btn-add-item" type="button" class="btn btn-primary">Add product</button>
                    </div>

                </form>
            </div>
        </div>
    </div>






    <div class="table-responsive mt-3" id="product-gallery">

        <?php include('../actions/products/product-gallery.php') ?>


    </div>


</div>
<script src="js/add_product.js"></script>