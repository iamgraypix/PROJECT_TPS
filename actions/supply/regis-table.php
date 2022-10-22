<table class="table-striped table table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">Item Name</th>
            <th scope="col">Listing Price</th>
            <th scope="col">Retail Price</th>
            <th class="table-info" scope="col">Revenue</th>
            <th class="table-warning" scope="col">Revenue Percentage</th>
            <th class="table-danger" scope="col">Remarks</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('getAllRegis.php');
        foreach ($allSupply as $supplyItem) :
        ?>
            <tr>
                <td><?php echo $supplyItem['name']; ?></td>
                <td><?php echo "₱ " . $supplyItem['lis_price']; ?></td>
                <td><?php echo "₱ " . $supplyItem['ret_price']; ?></td>
                <td class="table-info"><?php echo "₱ " . $supplyItem['revenue']; ?></td>
                <td class="table-warning"><?php echo $supplyItem['revenue_perc'] . " %"; ?></td>
                <td class="table-danger"><?php echo $supplyItem['remarks'] ?></td>
            </tr>
        <?php endforeach; ?>

        <!-- </tr> -->
        <!-- lagyan ng kulay ang Revenue at Revenue Percentage -->
    </tbody>
</table>