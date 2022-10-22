
//get the pages without refreshing the whole document
$(document).ready(function(){
    // $("#dashboard").click(function(){
    //     $("#content").load("includes/inc_dashboard.php");
    // });

    $("#products").click(function(){
        $("#content").load("includes/inc_products2.php");
    });

    $("#order").click(function(){
        $("#content").load("includes/inc_order.php");
    });

    $("#supplier").click(function(){
        $("#content").load("includes/inc_suppliers.php");
    });

    $("#stock").click(function(){
        $("#content").load("includes/inc_stock-monitor.php");
    });

    $("#sales").click(function(){
        $("#content").load("includes/inc_sales.php");
    });

    $("#sales-report").click(function(){
        $("#content").load("includes/inc_salesReport.php");
    });

    //get the time automatically
    setInterval(function(){
        $("#time").load("includes/inc_time.php");
    }, 1000);

});


//which is the active in the navigation side bar
var newActive;
var active;
function show(element) {
    
    active = document.querySelector(".active")
    active.classList.remove("active");

    newActive = document.getElementById(element);
    
    newActive.classList.add("active");    
}

var toastTrigger = document.getElementById('liveToastBtn')
var toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
  var toast = new bootstrap.Toast(toastLiveExample)
  toast.show()

}





