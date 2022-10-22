<?php
    include('../../includes/inc_DBConnection.php');
    $productName = $_POST['product_name'];
    $productCode = $_POST['product_code'];
    $productPrice = $_POST['product_price'];

    if(!empty($productName) && !empty($productCode) && !empty($productPrice)){
        //insert the data in the database
        
        if($ConnectToServer){
            $table = "products";
            $sql = "INSERT INTO $table (prd_name, prd_code, prd_price) VALUES('$productName', '$productCode', '$productPrice')";

            $result = mysqli_query($ConnectToServer, $sql);
            if($result === FALSE){
                echo "<div class=\" mt-3 alert alert-danger\" role=\"alert\" id=\"error2-addPrd\">
                <div>
                <span><i class=\"bi bi-exclamation-triangle-fill fs-4 me-1\"></i><span>
                    Unable to saved. Error Code: ". mysqli_connect_errno($ConnectToServer). ": "
                    .mysqli_connect_error($ConnectToServer)." 
                </div>
            </div>";
            }else{
                echo "<div class=\" mt-3 alert alert-success\" role=\"alert\" id=\"success-addPrd\">
                        <div>
                        <span><i class=\"bi bi-check-circle-fill fs-4 me-1\"></i><span>
                            Successfully insert the product
                        </div>
                    </div>";
                    
            }

        }else{
            echo "<div class=\" mt-3 alert alert-danger\" role=\"alert\" id=\"error1-addPrd\">
            <div>
            <span><i class=\"bi bi-exclamation-triangle-fill fs-4 me-1\"></i><span>
                Unable to connect to the server. Error Code: ". mysqli_connect_errno(). ": ".mysqli_connect_error()." 
            </div>
        </div>";
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