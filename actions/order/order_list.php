<?php

include("getAllOrder.php");

?>


<div class="table-responsive mt-4">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Qty</th>
                <th class="table-info" scope="col">Price</th>
                <th class="table-success" scope="col">Amount</th>
                <th class="table-warning" scope="col">Date</th>
                <th class="table-danger" scope="col">Customer ID</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allOrder as $product) : ?>
                <tr>
                    <td><?php echo $product['name'] ?></td>
                    <td><?php echo $product['qty'] ?></td>
                    <td class="table-info" ><?php echo $product['price'] ?></td>
                    <td class="table-success"><?php echo $product['amount'] ?></td>
                    <td class="table-warning">

                        <?php
                        //check the if the date is today
                        if ($product['date'] == date("Y-m-d")) {
                        ?>
                            <b style="color: green">Today</b>
                        <?php
                        } else {
                            echo $product['date'];
                        }
                        ?>
                    </td>
                    <td class="table-danger"><?php echo $product['customer_id'] ?></td>


                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>