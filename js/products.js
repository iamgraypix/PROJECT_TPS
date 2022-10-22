$(document).ready(function(){
  //add-product
    $("#add-product-submit").click(function(){
       var productName = $("#product-name").val();
       var productCode = $("#product-code").val();
       var productPrice = $("#product-price").val();

      //check if the textbox is not blank
      if($.trim(productName) != "" && $.trim(productCode) != "" && $.trim(productPrice) != ""){
        $.post("actions/products/add-product.php" , {
          product_name: productName,
          product_code : productCode,
          product_price: productPrice
         }, function(data, status){
            $("#product-name").val("");
            $("#product-code").val("");
            $("#product-price").val("");
            $("#test").html(data);
            $("#product-list").load("actions/products/product-gallery.php");
         });

      }else{
        $("#test").html(
          "<div class=\"mt-3 alert alert-warning\">"
          +"<span><i class=\"bi bi-exclamation-triangle-fill fs-4 me-1\"></i><span>"
          +" Fill all the inputs!"
          +"</div>"
        );
      }

    });
});


