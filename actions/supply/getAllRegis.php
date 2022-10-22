<?php 

    //connect to the database
    $DbName = "lugaw_ni_onoy";

    $ConnectToServer = mysqli_connect("localhost", "root", "", $DbName);

    if($ConnectToServer){
        
        $allSupply = array();

        $table_name = "supply";

        $sql = "SELECT * FROM $table_name ORDER BY d DESC";

        $result = mysqli_query($ConnectToServer, $sql);

        $i = 0;

        while($row = mysqli_fetch_assoc($result)){
            $allSupply[$i] = array(
                "name"=>$row['item_name'], 
                "lis_price"=>$row['listing_price'], 
                "ret_price"=>$row['retail_price'], 
                "revenue"=>$row['revenue'],
                "revenue_perc"=>$row['revenue_perc'],
                "remarks" => $row['remarks']
            );
            $i++;
        }

    }


?>