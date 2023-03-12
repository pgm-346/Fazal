// time out dashboard 

$("document").ready(function() {
    setTimeout(function() {
        $("div.alert").remove();
    }, 3000); // 5 secs

});

// Home
$(document).ready(function() {
    $("#card-header-1").click(function() {
        $("#card-body-1").show();
        $("#card-body").hide();
        $("#card-body-3").hide();
        $("#card-body-2").hide();
    });
});

// deposite
$(document).ready(function() {
    $("#card-header-2").click(function() {
        $("#card-body-2").show();
        $("#card-body").hide();
        $("#card-body-1").hide();
        $("#card-body-3").hide();
    });
});

// withdraw

$(document).ready(function() {
    $("#card-header").click(function() {
        $("#card-body").show();
        $("#card-body-1").hide();
        $("#card-body-2").hide();
        $("#card-body-3").hide();
    });
});


// Statement
$(document).ready(function() {
    $("#card-header-3").click(function() {
        $("#card-body-3").show();
        $("#card-body-1").hide();
        $("#card-body-2").hide();
        $("#card-body").hide();
    });
});


 






$(document).ready(function() {
    $("#card-header-4").click(function() {
        $("#card-body-2").toggle();
        $("#card-body-3").hide();
        $("#card-body").hide();
    });
});




$(document).ready(function() {
    $(".dropdown-toggle").click(function() {
        $(".dropdown-menu").toggle();

    });
});



 