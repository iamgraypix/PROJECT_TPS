<?php
include('../actions/products/getAllProducts.php');
include('../actions/stock/stock-monitor.php');


// //remove all duplicate product and add their quantity 
// //to the same one product
for ($i = 0; $i < sizeof($allProducts); $i++) {
    $length = sizeof($allProducts);
    for ($j = ($i + 1); $j < $length; $j++) {
        if ($allProducts[$i]['name'] == $allProducts[$j]['name']) {
            $allProducts[$i]['qty'] += $allProducts[$j]['qty'];
            unset($allProducts[$j]);
        }
    }
    $allProducts = array_values($allProducts);
}


print_r($allProducts);


if ($ConnectToServer) :

    $noStock = "";
    $hasStock = "";

    for($i = 0; $i < sizeof($stock); $i++){
        if($stock[$i]['available'] == 0){
            $noStock = $stock[$i]['item_name'];
        }else{
            $hasStock = $stock[$i]['item_name'];
        }
        for($j = 0; $j < sizeof($allProducts); $j++){
            if($noStock == $allProducts[$j]['name']){
                unset($allProducts[$j]);
                break;
            }else if($hasStock == $allProducts[$j]['name']){
                $allProducts[$j]['available'] = $stock[$i]['available'];
            }
        }
        $allProducts = array_values($allProducts);
        
    }

    

?>
    <div id="order-content">

        <h1 class="display-4 text-center">Order</h1>

        <div class="row mt-4 justify-content-around">
            <div class="col-12 col-md-3">
                <div class="input-group mb-2">
                    <input id="search-product-bar" type="text" class="form-control " placeholder="Product Name" aria-describedby="button-addon2">
                    <button id="search-product-btn" class="btn btn-dark" type="button" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <button type="button" class="w-100 btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#addOrderModal">
                    <span>
                        <i class="bi bi-plus-square-fill fs-5 me-2"></i>
                        Order
                    </span>
                </button>
            </div>

            <!-- add order -->
            <div class="modal fade" id="addOrderModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 col-lg-4 me-auto">
                                    <div class="input-group mb-2">
                                        <input id="search-product-bar" type="text" class="form-control " placeholder="Products's Code" aria-describedby="button-addon2">
                                        <button id="search-product-btn" class="btn btn-dark" type="button" id="button-addon2">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col col-lg-2 ms-auto d-flex align-items-center">

                                    <small class="text-muted">
                                        Available:
                                    </small>
                                    <h3 class="mx-2" id="avble"></h3>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 items-wrap overflow-auto">

                                    <?php



                                    foreach ($allProducts as $product) :

                                    ?>

                                        <div class="row p-2 align-items-center">
                                            <button id="product-item-<?php echo $product['id']; ?>" onclick="order('<?php echo $product['id']; ?>')" class="no-border col position-relative items rounded d-flex justify-content-between align-items-center mt-3 p-2">
                                                
                                                <h3 id="prd-name-<?php echo $product['id']; ?>"><?php echo $product['name']; ?></h3>
                                                <span style="color: #DC3545;">
                                                    <p id="prd-price-<?php echo $product['id']; ?>" class="lead"><?php echo "₱ " . $product['rp']; ?></p>
                                                </span>
                                                <span id="badge-<?php echo $product['id']; ?>" style="display: none;" class="position-absolute top-0 start-99 translate-middle badge rounded-pill bg-danger">
                                                    1
                                                </span>
                                                <span style="display: none;" id="available-<?php echo $product['id']; ?>">
                                                    <?php echo $product['available']; ?>
                                                </span>
                                            </button>
                                            <div onclick="minusOrder('<?php echo $product['id']; ?>')" id="minus-btn-<?php echo $product['id']; ?>" class="col-1" style="display: none;">
                                                <button class="btn p-0">
                                                    <i style="color: #FFC107;" class="bi bi-dash-circle-fill fs-3"></i>
                                                </button>
                                            </div>
                                        </div>

                                    <?php
                                    endforeach;
                                    ?>

                                </div>
                                <div class="col-md-6 ">
                                    <div class="items-wrap overflow-auto" id="order-details">
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-between">
                                        <h4>Total Amount</h4>
                                        <span style="display:flex;">
                                            ₱<h3 style="color: #157347;" id="total-amount">0</h3>
                                        </span>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment -->
            <div class="modal fade" id="exampleModalToggle2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel2">Payment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-7">
                                    <label for="cusName" class="col-form-label">
                                        <h5>Customer Name</h5>
                                    </label>
                                    <input id="cusName" type="text" class="form-control" placeholder="Optional">
                                </div>
                                <div class="col">
                                    <label for="date" class="col-form-label">
                                        <h5>Date</h5>
                                    </label>
                                    <input id="date" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="totalAmount" class="col-form-label">
                                        <h5>Total Amount:</h5>
                                    </label>
                                </div>
                                <div class="col-8">
                                    <input id="totalPayment" type="text" value="₱ 0.00" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="cash" class="col-form-label">
                                        <h5>Cash Tendered:</h5>
                                    </label>
                                </div>
                                <div class="col-8">
                                    <input type="number" id="cash" class="form-control">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="change" class="col-form-label">
                                        <h5>Change:</h5>
                                    </label>
                                </div>
                                <div class="col-8">
                                    <input type="text" id="change" class="form-control" disabled>
                                </div>
                            </div>
                            <div id="rs"></div>
                        </div>
                        <div class="modal-footer">
                            <button data-bs-target="#addOrderModal" data-bs-toggle="modal" class="btn btn-secondary">Back</button>
                            <button id="paid" class="btn btn-primary">Paid</button>
                        </div>
                    </div>
                </div>
            </div>




            <!-- order list -->
            <div id="order-list">
                <?php include("../actions/order/order_list.php"); ?>
            </div>

        </div>

    </div>

<?php endif; ?>

<script src="js/order.js"></script>