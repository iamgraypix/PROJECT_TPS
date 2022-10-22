<?php 

    include('../../includes/inc_DBConnection.php');
    if($ConnectToServer){
        
        // print_r($_POST['item']);

        //make a record first for the customer then record the order details

        $customerRecord = 'customer';

        //store all in variables
        $cust_name = $_POST['customer'];
        $cust_cash = $_POST['cash'];
        $cust_change = $_POST['change'];
        $cust_pay = trim($_POST['totalPay'], "₱ ");
        


        $sql_cust = "INSERT INTO $customerRecord (name, cash, change_amt, totalpay)
        VALUES('$cust_name', '$cust_cash', '$cust_change', '$cust_pay')";

        $sql_cust_result = mysqli_query($ConnectToServer, $sql_cust);

        if($sql_cust_result === FALSE){
            echo "unable to save.".
            "<p>Error Code". mysqli_errno($ConnectToServer) . " :" . mysqli_error($ConnectToServer) . "</p>";;
        }else{
            echo "Customer saved"."<br>";
        }
    }


    mysqli_close($ConnectToServer);
