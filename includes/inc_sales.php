<?php
include('../actions/sales/sales.php');
?>
<div>


    <h1 class="display-5 text-center mb-4">Revenue</h1>

    <div class="table-responsive">
        <table class="table-striped table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="table-danger" scope="col">Total of Capital Money</th>
                    <th class="table-warning" scope="col">Total of Sold Items</th>
                    <th class="table-success" scope="col">Revenue</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="table-danger"  ><h3>₱ <?php echo number_format($capital, 2); ?></h3></td>
                    <td class="table-warning"><h3>₱ <?php echo number_format($sold_items, 2) ; ?></h3></td>
                    <td class="table-success"><h3 style="color: green;">₱ <?php echo number_format($revenue, 2); ?></h3></td>
                </tr>

            </tbody>
        </table>
    </div>

</div>