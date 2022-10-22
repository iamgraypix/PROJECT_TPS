<?php 

    include('../../includes/inc_DBConnection.php');

    if($ConnectToServer){
        $table = "products";

        $date =  $_POST['date'];
        $item_name = $_POST['item_name'];
        $quantity = $_POST['quantity'];
        $listing_price = $_POST['listing_price'];
        $retail_price = $_POST['retail_price'];
        $total_listPrice = $_POST['total_listPrice'];
        $total_retailPrice = $_POST['total_retailPrice'];


         //check if the item is alredy in the database

         $sqlCheck = "SELECT * FROM $table WHERE name = '$item_name' AND d = '$date'";

         $checkResult = mysqli_query($ConnectToServer, $sqlCheck);

        //if not then add it to the database...
        if(mysqli_num_rows($checkResult) === 0){

            $sqlInsert = "INSERT INTO $table (d, name, qty, retail_p, total_rp, listing_p, total_lp) ".
            "VALUES('$date', '$item_name','$quantity', '$retail_price', '$total_retailPrice', '$listing_price', '$total_listPrice')";
            
            $insertResult = mysqli_query($ConnectToServer, $sqlInsert);
            
            if($insertResult === FALSE){
                echo "unable to insert";
            }else{
                echo "<div class=\"alert alert-success\" role=\"alert\">
                <i class=\"bi bi-check-square\"></i>
                The item was added successfully and it now available in the market.
              </div>";
            }

        }else{
            echo "already in the database. Add the quantity";
        }


        //update the quantity of the product in supply table
        $supply_table = 'supply';
        $update = "UPDATE $supply_table SET quantity = quantity + ($quantity),at_hand = at_hand + ($quantity) , remarks = 'for sale' WHERE item_name = '$item_name' ";

        if (mysqli_query($ConnectToServer, $update)) {
            echo "Supply also updated";
          } else {
            echo "Error updating record: " . mysqli_error($ConnectToServer);
          }


    }




    mysqli_close($ConnectToServer);
