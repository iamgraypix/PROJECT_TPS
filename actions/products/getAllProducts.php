<?php
    //connect to the database
    $DbName = "lugaw_ni_onoy";

    $ConnectToServer = mysqli_connect("localhost", "root", "", $DbName);

    //if connected to the database
    if($ConnectToServer){

        $allProducts = array();

        $table_name = "products";
        $sql = "SELECT * FROM $table_name ORDER BY d DESC";

        $result = mysqli_query($ConnectToServer, $sql);

        $i = 0;

        while($row = mysqli_fetch_assoc($result)){
            $allProducts[$i] = array(
                "id"=>$row['id'],
                "date"=>$row['d'], 
                "name"=>$row['name'], 
                "qty"=>$row['qty'], 
                "rp"=>$row['retail_p'], 
                "trp"=>$row['total_rp'], 
                "lp"=>$row['listing_p'], 
                "tlp"=>$row['total_lp'], 
            );
            $i++;
        }


    }
?>