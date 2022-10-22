<?php

$all_items = $_POST['item_details'];
$date = $_POST['date'];
$customerRecord = 'customer';

//store all in variables
$cust_name = $_POST['customer'];
$cust_cash = $_POST['cash'];
$cust_change = $_POST['change'];
$cust_pay = trim($_POST['totalPay'], "₱ ");

include('../../includes/inc_DBConnection.php');

if ($ConnectToServer) {
    //then if there is a customer details there must order details
    //get the customer_id
    $customerRecord = "customer";
    $sql = "SELECT * FROM $customerRecord";
    $result = mysqli_query($ConnectToServer, $sql);
    $rows =  mysqli_fetch_assoc($result);


    //save the order details
    $order_record = "purchase";

    if ($result = mysqli_query($ConnectToServer, $sql)) {

        $rowCount = mysqli_num_rows($result);

        $customer_id = "CUS" . $rowCount;

        for ($i = 0; $i < sizeof($all_items); $i++) {

            $arrayObject = new ArrayObject($all_items[$i]);
            $item_detail = $arrayObject->getArrayCopy();

            $name = 0;
            $price = 1;
            $qty = 2;
            $amount = 3;

            $sql_order = "INSERT INTO $order_record (prd_name, prd_price, qty, amount, d, cust_id)
                VALUES('$item_detail[$name]', '$item_detail[$price]', '$item_detail[$qty]', '$item_detail[$amount]', '$date', '$customer_id')";

            $sql_order_result = mysqli_query($ConnectToServer, $sql_order);

            if ($sql_order_result === FALSE) {
                $order_saved = false;
                echo "unable to save the order." .
                    "<p>Error Code" . mysqli_errno($ConnectToServer) . " :" . mysqli_error($ConnectToServer) . "</p>";;
            } else {
                $order_saved = true;

                $item_qty = $item_detail[$qty];

                $supply_table = 'supply';
                $sql_update_supply = "UPDATE $supply_table SET at_hand = at_hand - ($item_qty) WHERE item_name = '$item_detail[$name]' ";


                if (mysqli_query($ConnectToServer, $sql_update_supply)) {
                    echo "The quantity of ".$item_detail[$name]." is updated";
                  } else {
                    echo "Error updating record: " . mysqli_error($ConnectToServer);
                  }

                
            }
        }


        $sql_cust = "INSERT INTO $customerRecord (name, cash, change_amt, totalpay, cust_id)
        VALUES('$cust_name', '$cust_cash', '$cust_change', '$cust_pay', '$customer_id')";

        
        $sql_cust_result = mysqli_query($ConnectToServer, $sql_cust);

        if ($sql_cust_result === FALSE) {
            $customer_saved = false;
            echo "unable to save customer." .
                "<p>Error Code" . mysqli_errno($ConnectToServer) . " :" . mysqli_error($ConnectToServer) . "</p>";;
        } else {
            $customer_saved = true;
        }

        if($order_saved && $customer_saved){
            echo "Transactions Saved Successfully!";

        
        }

    }
}

mysqli_close($ConnectToServer);
