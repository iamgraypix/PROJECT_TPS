<?php 

    //tanggaling ang percent symbol sa revenue percentage

    include('../../includes/inc_DBConnection.php');

    if($ConnectToServer){
        $table = "supply";

        $item_name = $_POST['item_name'];
        $listing_price = $_POST['listing_price'];
        $retail_price = $_POST['retail_price'];
        $revenue = $_POST['revenue'];
        $revenue_perc = trim($_POST['revenue_perc'], "% ");
        $qty = $_POST['qty'];
        $remarks = "not sale";
        $date = date("Y-m-d");
        $at_hand = 0;
        //check if the item is alredy in the database

        $sqlCheck = "SELECT * FROM $table WHERE item_name = '$item_name' ";

        $checkResult = mysqli_query($ConnectToServer, $sqlCheck);

        //if not then add it to the database...
        if(mysqli_num_rows($checkResult) === 0){
            
            $sqlInsert = "INSERT INTO $table (item_name, listing_price, retail_price, revenue, revenue_perc, quantity, remarks, d, at_hand) ".
            "VALUES('$item_name', '$listing_price', '$retail_price', '$revenue', '$revenue_perc', '$qty', '$remarks', '$date', '$at_hand')";

            $insertResult = mysqli_query($ConnectToServer, $sqlInsert);

            if($insertResult === FALSE){
                echo "unable to insert";
            }else{
                echo "<div class=\"alert alert-success\" role=\"alert\">
                <i class=\"bi bi-check-square\"></i>
                Item registered successfully!
              </div>";
            }


        }else{
            echo "The product is already in the list!";
        }


    }
