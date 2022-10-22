<?php 
    //connect to the database
    $DbName = "lugaw_ni_onoy";

    $ConnectToServer = mysqli_connect("localhost", "root", "", $DbName);

    if($ConnectToServer){
        
        $allOrder = array();

        $table_name = "purchase";

        $sql = "SELECT * FROM $table_name ORDER BY d DESC";

        $result = mysqli_query($ConnectToServer, $sql);

        $j = 0;
        while($row = mysqli_fetch_assoc($result)){
            $allOrder[$j] = array(
                "name" => $row['prd_name'],
                "price" => $row['prd_price'],
                "qty" => $row['qty'],
                "amount" => $row['amount'],
                "date" => $row['d'],
                "customer_id" => $row['cust_id']
            );
            $j++;
        }        

    }


?>