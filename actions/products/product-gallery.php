<div class="table-responsive">
<table class="table-striped table table-hover table-bordered">

    <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Item Name</th>
            <th scope="col">Qty</th>
            <th class="table-info" scope="col">Retail Price</th>
            <th class="table-success" scope="col">Total Retail Price</th>
            <th class="table-warning" scope="col">Listing Price</th>
            <th class="table-danger" scope="col">Total Listing Price</th>
            <!-- <th scope="col">Remarks</th> -->

        </tr>
    </thead>
    <tbody>
        <?php
        include('getAllProducts.php');
        foreach ($allProducts as $product) :
        ?>
            <tr>
                <td>
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
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['qty']; ?></td>
                <td class="table-info" ><?php echo "₱ " . $product['rp']; ?></td>
                <td class="table-success" ><?php echo "₱ " . $product['trp']; ?></td>
                <td class="table-warning" ><?php echo "₱ " . $product['lp']; ?></td>
                <td class="table-danger" ><?php echo "₱ " . $product['tlp']; ?></td>
                <!-- <td>[Remarks]</td> -->
            </tr>


        <?php endforeach; ?>
    </tbody>

</table>
</div>
