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
        if($row['quantity'] > 0){
            $allSupply[$i] = array(
                'item_name' => $row['item_name'],
                'quantity' => $row['quantity'],
                'at_hand' => $row['at_hand']
            );
        }
        
        $i++;
    }

}
// aayusin ang numbering ng index sa array
$allSupply = array_values($allSupply);

mysqli_close($ConnectToServer);
include('num_purchase_prod.php');

$stock = array();


for ($i = 0; $i < sizeof($allSupply); $i++) {
    $match = false;
    for ($j = 0; $j < sizeof($num_purchase); $j++) {
        if ($allSupply[$i]['item_name'] == $num_purchase[$j]['name']) {
            $stock[$i]['item_name'] = $num_purchase[$j]['name'];
            $stock[$i]['receive'] = $allSupply[$i]['quantity'];
            $stock[$i]['sales'] = $num_purchase[$j]['sales'];
            $stock[$i]['available'] = $allSupply[$i]['at_hand'];
            $match = true;
        }
    }
    //kung may supply pero wala pang bumibili
    //set the sale into 0
    if (!$match) {
        $stock[$i]['item_name'] = $allSupply[$i]['item_name'];
        $stock[$i]['receive'] = $allSupply[$i]['quantity'];
        $stock[$i]['sales'] = 0;
        $stock[$i]['available'] = $allSupply[$i]['quantity'];
    }
}
