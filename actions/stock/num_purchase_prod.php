<?php 

    //get the purchased product from purchase table

    $table = "purchase";

    //connect to the database
    $DbName = "lugaw_ni_onoy";

    $ConnectToServer = mysqli_connect("localhost", "root", "", $DbName);

    if($ConnectToServer){

        $sql = "SELECT * FROM $table";

        $result = mysqli_query($ConnectToServer, $sql);

        $i = 0;
        $num_purchase = array();

       
            while($row = mysqli_fetch_assoc($result)){
                $num_purchase[$i] = array("name"=>$row['prd_name'], "sales"=>$row['qty']);
                $i++;
            }

    }

    //remove duplicate ones and add their number of sales
    for ($i = 0; $i < sizeof($num_purchase); $i++) {
        $length = sizeof($num_purchase);
        for ($j = ($i + 1); $j < $length; $j++) {
            if ($num_purchase[$i]['name'] == $num_purchase[$j]['name']) {
                $num_purchase[$i]['sales'] += $num_purchase[$j]['sales'];
                unset($num_purchase[$j]);
            }
            
        }
        $num_purchase = array_values($num_purchase);
    }
    
    mysqli_close($ConnectToServer);

?>