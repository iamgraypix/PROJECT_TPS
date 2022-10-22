<?php 


    //connect to the database
    $DbName = "lugaw_ni_onoy";

    $ConnectToServer = mysqli_connect("localhost", "root", "", $DbName);

    if($ConnectToServer){

        $supply_table = 'supply';

        $sql = "SELECT * FROM $supply_table ";

        $i = 0;

        $result = mysqli_query($ConnectToServer, $sql);

        $allSupply = array();

        while($row = mysqli_fetch_assoc($result)){
            $allSupply[$i] = array(
                'item_name' => $row['item_name'],
                'quantity' => $row['quantity'],
            );

            $i++;
        }

    }


    mysqli_close($ConnectToServer);

?>