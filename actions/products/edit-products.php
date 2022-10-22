<?php 
    //Connect to the database
    include('../../includes/inc_DBConnection.php');

    $prd_id = $_POST['product_id'];
    $prd_name = $_POST['product_name'];
    $prd_code = $_POST['product_code'];
    $prd_price = $_POST['product_price'];

    $table = 'products';


    if(!empty($prd_name) && !empty($prd_code) && !empty($prd_price)){

        if($ConnectToServer){
            $sql = "UPDATE $table SET prd_name= 
            '$prd_name', prd_code='$prd_code', prd_price='$prd_price' WHERE prd_id='$prd_id'";

            if(mysqli_query($ConnectToServer, $sql)){
                echo "<div class=\" mt-3 alert alert-success\" role=\"alert\" id=\"success-edit\">
                        <div>
                        <span><i class=\"bi bi-check-circle-fill fs-4 me-1\"></i><span>
                            Successfully Update the product
                        </div>
                    </div>";
            }else{
                echo "Error updating record: ".mysqli_error($ConnectToServer);
            }

        }
    }else{
        echo "<div class=\" mt-3 alert alert-warning\" role=\"alert\" id=\"no-input-addPrd\">
        <div>
        <span><i class=\"bi bi-exclamation-triangle-fill fs-4 me-1\"></i><span>
            Fill all the inputs!
        </div>
    </div>";
    }

    mysqli_close($ConnectToServer);
?>