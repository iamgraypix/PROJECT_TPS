var qty = document.getElementById("quantity");
var selectItem = document.getElementById("inputState");
var listPrice = document.getElementById("listing-price");
var retailPrice = document.getElementById("retail-price");
var date = document.getElementById("date");
var totalListPrice = document.getElementById("tot-list-price")
var totalRetailPrice = document.getElementById("tot-retail-price")


qty.addEventListener("input", function(e){
    var quantity = e.target.value;

    totalListPrice.value = (listPrice.value * quantity).toFixed(2)
    totalRetailPrice.value = (retailPrice.value * quantity).toFixed(2)

})

selectItem.addEventListener("input", function(e){
    var x = e.target.value;
    var quantity = qty.value;

    const prices = x.split("/");

    listPrice.value = prices[1];
    retailPrice.value = prices[2];

    totalListPrice.value = (listPrice.value * quantity).toFixed(2)
    totalRetailPrice.value = (retailPrice.value * quantity).toFixed(2)

})


$(document).ready(function (){

    $("#btn-add-item").click(function(){
       
        const values = selectItem.value.split("/");

       var quan = $("#quantity").val();
       var item = values[0]
       var lp = $("#listing-price").val();
       var rp = $("#retail-price").val();
        var tlp = $("#tot-list-price").val();
        var trp = $("#tot-retail-price").val();
        var d = date.value;

        if($.trim(quan) != "" && $.trim(item) != "" && $.trim(d) != ""){
            $.post("actions/products/product.php", {
                date: date.value,
                item_name: item,
                quantity: quan,
                listing_price: lp,
                retail_price: rp,
                total_listPrice: tlp,
                total_retailPrice: trp 
            }, function(data, status){
                $("#inputState").val("");
                $("#quantity").val("");
                $("#listing-price").val("");
                $("#retail-price").val("");
                $("#tot-list-price").val("");
                $("#tot-retail-price").val("");
                $("#product-gallery").load("actions/products/product-gallery.php");
                $("#test").html(data);
            });
        }


    })

})