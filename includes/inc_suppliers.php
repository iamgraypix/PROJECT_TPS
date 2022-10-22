<div>

    <h1 class="display-5 text-center mb-5">Registered Items</h1>

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
            <button type="button" class="w-100 btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#add-item-modal">
                <span>
                    <i class="bi bi-plus-square-fill fs-5 me-2"></i>
                    Add Item
                </span>
            </button>
        </div>

    </div>


    <!-- Add Item Modal -->
    <div class="modal fade" id="add-item-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="item-name" class="form-label">Item Name</label>
                                <input type="text" class="form-control" name="item-name" id="item-name" autocomplete="off" required>
                            </div>
                            <div class="col-6">
                                <label for="listing-price" class="form-label">Listing Price</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">₱</span>
                                    <input autocomplete="off" type="number" class="form-control" name="listing-price" id="listing-price" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="retail-price" class="form-label">Retail Price</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">₱</span>
                                    <input autocomplete="off" type="number" class="form-control" name="retail-price" id="retail-price" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <h5>
                                    Revenue: Php
                                    <input type="text" class="form-control" id="revenue" disabled>
                                </h5>

                            </div>
                            <div class="col">
                                <h5>
                                    Revenue Per:
                                    <input type="text" class="form-control" id="revenue-percent" disabled>
                                </h5>

                            </div>
                        </div>

                        <div id="test">
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


    <div class="table-responsive mt-3" id="regis-table">
        <?php
            include('../actions/supply/regis-table.php');
        ?>
    </div>
</div>

<script src="js/regis.js"></script>