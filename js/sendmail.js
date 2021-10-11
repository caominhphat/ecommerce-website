$("#mail_form").submit(function (e) { 
    e.preventDefault();
    var i = $(".tblone tr:nth-child(2) ").html();
    if(i == null){
        alert("You do not have any order");
    }else{
        var method = $(this).attr("method");
        var submitUrl = $(this).attr("action");
        $.ajax({
            type: method,
            url: submitUrl,
            success: function (response) {
                alert("Send Successfully");
            }
        });
    }
});

$("a[name='order_now']").click(function (e) { 
    e.preventDefault();
    $(location).attr('href','?page=payment&action=offlinepayment&orderid=order');
});



