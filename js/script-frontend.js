$(function(){
    $("a[name='submit']").click(function (e) { 
        e.preventDefault();
        var id = $(this).siblings("input[name='id']").val();
        var quantity = $(this).siblings("input[name='quantity']").val();
        var submit = $(this).attr("name");
        var submitUrl = $(this).parent().attr("action");      
        alert("Do you want to add?");
        $.ajax({
            type: "POST",
            url: submitUrl,
            data: {id: id, quantity: quantity, submit: submit},
            success: function(response){
                var i = (parseInt($(".no_product").text()) + 1).toString();
                $(".no_product").text(i);
            }
        });
    });

    $("#comment").submit(function (e) { 
        e.preventDefault();
        var binhluan = $(this).children("p[name='binhluan']").children().val();
        var submit = "binhluan_submit";
        var submitUrl = $(this).attr("action");
        $.ajax({
            type: "POST",
            url: submitUrl,
            data: {binhluan: binhluan,  binhluan_submit: submit}, 
        });
        alert("Your comment will be post later");
        $("#cmt").attr("value", "");
    });
});
 