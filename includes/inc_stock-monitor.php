<?php

include('../actions/stock/stock-monitor.php');


// print_r($num_purchase);

//lagyan mo ng sold out pag ubos na yung product




?>

<div id="stock-content">


    <h1 class="display-5 text-center mb-5">Stock Monitor</h1>

    <div class="table-responsive">
        <table class="table-striped table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="table-info" scope="col">Item Names</th>
                    <th class="table-warning" scope="col">Receive</th>
                    <th class="table-success" scope="col">Sales</th>
                    <th class="table-danger" scope="col">Availabe</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($stock as $product) : ?>
                    <tr>
                        <td class="table-info"><?php echo $product['item_name'] ?></td>
                        <td class="table-warning"><?php echo $product['receive'] ?></td>
                        <td class="table-success"><?php echo $product['sales'] ?></td>
                        <td class="table-danger">
                            <?php

                            if($product['available'] <= 0){
                                echo "Sold Out";
                            }else{
                                echo $product['available'];
                            }
                            

                            ?>
                        </td>


                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</div>