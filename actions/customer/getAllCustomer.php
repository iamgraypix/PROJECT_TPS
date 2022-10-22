<?php 

    $DbName = "lugaw_ni_onoy";

    $ConnectToServer = mysqli_connect("localhost", "root", "", $DbName);


    if($ConnectToServer){
        
        $allCustomer = array();

        $table_name = "customer";
        $sql = "SELECT * FROM $table_name";

        $result = mysqli_query($ConnectToServer, $sql);

        $i = 0;
        $numCustomer = 0;
        if($result){
            $numCustomer = mysqli_num_rows($result);
            // mysqli_free_result($result);
        }

        while($row = mysqli_fetch_assoc($result)){
            $allCustomer[$i] = array(
                'id'=>$row['cust_id'],
                'name'=>$row['name'],
                'cash'=>$row['cash'],
                'change'=>$row['change_amt'],
                'totalpay'=>$row['totalpay']
            );
            $i++;
        }


    }

    
