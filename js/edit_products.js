function edit(x){
    var id = x;

    $(document).ready(function(){
    
    $("#btn-saved-edit-" + id).click(function() {
        var editPrdName = $("#product-name-edit-"+id).val();
        var editPrdCode = $("#product-code-edit-"+id).val();
        var editPrdPrice = $("#product-price-edit-"+id).val();
        $.post("actions/products/edit-products.php", {
            product_id : id,
            product_name : editPrdName,
            product_code : editPrdCode,
            product_price : editPrdPrice
        }, function(data, status){  
            $("#edit-result-"+id).html(data);
        });
    });

});
}

function reload(){
    $(document).ready(function(){
        $("#product-list").load('actions/products/product-gallery.php');
    });
}

//Delete product
function deletePrd(x) {
    var ID = x;
    $(document).ready(function (){
        $.post("actions/products/delete-product.php" , {
            product_id: ID
        }, function(data, status){
                alert(data);
                reload();
        });
    });
}


//search

var Btnsearch = document.getElementById("search-product-btn");
var searchBar = document.getElementById("search-product-bar");


$(document).ready(function(){
    $(Btnsearch).click(function (){
        var product = $(searchBar).val();
        $.post("actions/products/product-gallery.php" , {
            search: product
        }, function(data, status){
            $("#view-list").html(data);

        });
    });

});

