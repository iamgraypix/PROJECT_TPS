<?php 

    include('../../includes/inc_DBConnection.php');

    $id = $_POST['product_id'];

    if($ConnectToServer){
        
        $table = "products";

        $sql = "DELETE FROM $table WHERE prd_id = '$id' ";

        if(mysqli_query($ConnectToServer, $sql)){
            echo "Record deleted succesfully";
        }else{
            echo "Error delating record: ". mysqli_errno($ConnectToServer);
        }

    }

    mysqli_close($ConnectToServer);

?>