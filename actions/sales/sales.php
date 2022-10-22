<?php 

    $DbName = "lugaw_ni_onoy";

    $ConnectToServer = mysqli_connect("localhost", "root", "", $DbName);


    if($ConnectToServer){
        
        $sql = "SELECT SUM(total_lp) AS capital_money FROM products ";

        $result = mysqli_query($ConnectToServer, $sql);

        if($row = mysqli_fetch_assoc($result)){
            $capital = $row['capital_money'];
            $capital = ($row['capital_money'] === NULL) ? 0 : $row['capital_money'];
        }

        $sql2 = "SELECT SUM(amount) AS sold_items FROM purchase ";
        $result2 = mysqli_query($ConnectToServer, $sql2);

        
        if($row = mysqli_fetch_assoc($result2)){
            $sold_items = ($row['sold_items'] === NULL) ? 0 : $row['sold_items']; //$row['sold_items'];
        }

        if($sold_items < $capital){
            $revenue = 0.00;
        }else{
            $revenue = $sold_items - $capital;
        }

        // echo "Total Capital Money: ".$capital."<br>";
        // echo "Total Sold Items: ".$sold_items."<br>";
        // echo "Revenue: ".$revenue."<br>";


    }


?>