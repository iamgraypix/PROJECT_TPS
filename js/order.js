var arrayPrd = [];
var totalPayment = document.getElementById("totalPayment");

function order(id){
    
    var totalAmount = document.getElementById("total-amount");
    var prdName = document.getElementById("prd-name-"+id);    
    var prdPrice = document.getElementById("prd-price-"+id);    
    var badge = document.getElementById("badge-"+id);
    var minusButton = document.getElementById("minus-btn-"+id);
    var orderDetails = document.getElementById("order-details");
    var counter = 1;
    var price = prdPrice.innerHTML;
    var availableElement = document.getElementById('avble');
    var available = document.getElementById("available-"+id);
    var product = document.getElementById('product-item-'+id);

    //remove the peso sign in price
    price = price.replace("₱"," ");
    //then convert in numbers type
    price = Number(price);

    // availableElement.innerHTML =  available.innerHTML;


    if(badge.style.display == "block"){
        // if already display...
        //count the item and put it on badge
        counter = Number(badge.innerHTML);
        counter++;
        badge.innerHTML = counter;
        availableElement.innerHTML =  available.innerHTML - counter;
        document.getElementById("item-name-"+id).innerHTML = `<span style="color: #DC3545;">${counter}x</span> <b class="fs-5">${prdName.innerHTML}</b>`;
        document.getElementById("item-price-"+id).innerHTML = `${(price * counter).toFixed(2)}`;
    }else{
        // if not display
        //then display
        badge.style.display = "block"
        minusButton.style.display = "block"
        orderDetails.innerHTML += `
            <div id="${id}" class="d-flex justify-content-between">
                <b id="item-name-${id}" class="fs-5">${prdName.innerHTML}</b>
                <h5 id="item-price-${id}">${price.toFixed(2)}</h5>
            </div>`;

        availableElement.innerHTML =  available.innerHTML - counter;

    }
    
    var amount = document.getElementById("item-price-"+id);
    totalAmount = Number(totalAmount.innerHTML);

    totalAmount += price;

    document.getElementById("total-amount").innerHTML = totalAmount.toFixed(2);

    totalPayment.value = "₱ " + totalAmount.toFixed(2);

    
    //get the item and quantity

    if(arrayPrd.length == 0){
        arrayPrd.push(new Array(prdName.innerHTML, price ,counter, amount.innerHTML))
    }else{
        for(var i = 0; i < arrayPrd.length; i++){
            //check same product
            if(prdName.innerHTML == arrayPrd[i][0]){
                arrayPrd[i][2] = counter
                arrayPrd[i][3] = amount.innerHTML
                break;                
            }
            // if all element has been check...
            // and no match product, add NEW product
            if(i == (arrayPrd.length - 1)){
                arrayPrd.push(new Array(prdName.innerHTML, price ,counter, amount.innerHTML))
            }
        }
        
    }
    // console.log(available.innerHTML)
    //if the available counter is 0 then disabled the product
    if((available.innerHTML - counter) <= 0) {
        product.disabled = true;
    }
    
}

function minusOrder(id){


    var totalAmount = document.getElementById("total-amount");
    var badge = document.getElementById("badge-"+id);
    var prdPrice = document.getElementById("prd-price-"+id);   
    var prdName = document.getElementById("prd-name-"+id);
    var minusButton = document.getElementById("minus-btn-"+id);
    var counter;
    var availableElement = document.getElementById('avble');
    var available = document.getElementById("available-"+id);
    var product = document.getElementById('product-item-'+id);
    

    var price = prdPrice.innerHTML;
    //remove the peso sign in price
    price = price.replace("₱"," ");
    //then convert in numbers type
    price = Number(price);

    // minus 1 in badge
    counter = Number(badge.innerHTML);
    counter--;
    badge.innerHTML = counter;
    availableElement.innerHTML =  available.innerHTML - counter;

    document.getElementById("item-name-"+id).innerHTML = `<span style="color: #DC3545;">${counter}x</span> <b class="fs-5">${prdName.innerHTML}</b>`;
    document.getElementById("item-price-"+id).innerHTML = `${(price * counter).toFixed(2)}`;
    if(badge.innerHTML < "1"){
        badge.style.display = "none"
        minusButton.style.display = "none"
        badge.innerHTML = "1";
        document.getElementById(id).remove()
    }
    totalAmount = Number(totalAmount.innerHTML);

    totalAmount -= price;
    document.getElementById("total-amount").innerHTML = totalAmount.toFixed(2);

    totalPayment.value = "₱ " + totalAmount.toFixed(2);

    // minus the quantity of the product
    // if its got 0 then that product from the list
    for(var i = 0; i < arrayPrd.length; i++){
        if(prdName.innerHTML == arrayPrd[i][0]){
            arrayPrd[i][2] = counter;
            if(arrayPrd[i][2] == 0){
                arrayPrd.splice(i, 1);
            }
        }
    }

    //if the available counter is 0 then disabled the product
    if((available.innerHTML - counter) > 0) {
        product.disabled = false;
    }

}


var cash = document.getElementById("cash");

//cash-change automation
cash.oninput = function(event) {
    var cash = Number(event.target.value)
    var payment = Number(document.getElementById("total-amount").innerHTML)
    var change = document.getElementById("change");

    if(cash >= payment) {
        change.value = (cash - payment).toFixed(2);
    }else{
        change.value = "Not enough money!"
    }
}




$(document).ready(function(){
    $("#paid").click(function (){
        var cash = $("#cash").val();
        var totalPay = $("#totalPayment").val();
        var change = $("#change").val();
        var cus_name = $("#cusName").val();
        var date = $("#date").val();

        

        if($.trim(cash) != "" && $.trim(totalPay) != "" && $.trim(change) != "" && $.trim(date) != ""){
            $.post("actions/order/add_order.php", {
                //customer details
                cash: cash,
                totalPay: totalPay,
                change: change,
                customer: cus_name,
                //purchase details
                item_details: arrayPrd,
                date: date
            }, function(data){
                $("#rs").html(
                    "<div class=\"mt-3 alert alert-success\">"
                    +"<span><i class=\"bi bi-check-circle fs-4 me-1\"></i><span>"
                    + data
                    +"</div>"
                );
                $("#cash").val("")
                $("#totalPayment").val("")
                $("#change").val("")
                $("#order-list").load("actions/order/order_list.php");
            });
        }else{
            $("#rs").html(
              "<div class=\"mt-3 alert alert-warning\">"
              +"<span><i class=\"bi bi-exclamation-triangle-fill fs-4 me-1\"></i><span>"
              +" Fill all the inputs!"
              +"</div>"
            );
          }



        

    });
});


var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
