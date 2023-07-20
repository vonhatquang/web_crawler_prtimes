$(function() {
    "use strict";

    // Feather Icon Init Js
    // feather.replace();

    // $(".preloader").fadeOut();

    // =================================
    // Tooltip
    // =================================
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // =================================
    // Popover
    // =================================
    var popoverTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="popover"]')
    );
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    // increment & decrement
    $(".minus,.add").on("click", function() {
        var $qty = $(this).closest("div").find(".qty"),
            currentVal = parseInt($qty.val()),
            isAdd = $(this).hasClass("add");
        !isNaN(currentVal) &&
            $qty.val(
                isAdd ? ++currentVal : currentVal > 0 ? --currentVal : currentVal
            );
    });

    // ==============================================================
    // Collapsable cards
    // ==============================================================
    $('a[data-action="collapse"]').on("click", function(e) {
        e.preventDefault();
        $(this)
            .closest(".card")
            .find('[data-action="collapse"] i')
            .toggleClass("ti-minus ti-plus");
        $(this).closest(".card").children(".card-body").collapse("toggle");
    });
    // Toggle fullscreen
    $('a[data-action="expand"]').on("click", function(e) {
        e.preventDefault();
        $(this)
            .closest(".card")
            .find('[data-action="expand"] i')
            .toggleClass("ti-arrows-maximize ti-arrows-maximize");
        $(this).closest(".card").toggleClass("card-fullscreen");
    });
    // Close Card
    $('a[data-action="close"]').on("click", function() {
        $(this).closest(".card").removeClass().slideUp("fast");
    });

    // fixed header
    $(window).scroll(function() {
        if ($(window).scrollTop() >= 60) {
            $(".app-header").addClass("fixed-header");
        } else {
            $(".app-header").removeClass("fixed-header");
        }
    });

    // Checkout
    $(function() {
        $(".billing-address").click(function() {
            $(".billing-address-content").hide();
        });
        $(".billing-address").click(function() {
            $(".payment-method-list").show();
        });
    });
});

/*change layout boxed/full */
$(".full-width").click(function() {
    $(".container-fluid").addClass("mw-100");
    $(".full-width i").addClass("text-primary");
    $(".boxed-width i").removeClass("text-primary");
});
$(".boxed-width").click(function() {
    $(".container-fluid").removeClass("mw-100");
    $(".full-width i").removeClass("text-primary");
    $(".boxed-width i").addClass("text-primary");
});

/*Dark/Light theme*/
$(".light-logo").hide();
$(".dark-theme").click(function() {
    $("nav.navbar-light").addClass("navbar-dark");
    $(".dark-theme i").addClass("text-primary");
    $(".light-theme i").removeClass("text-primary");
    $(".light-logo").show();
    $(".dark-logo").hide();
});
$(".light-theme").click(function() {
    $("nav.navbar-light").removeClass("navbar-dark");
    $(".dark-theme i").removeClass("text-primary");
    $(".light-theme i").addClass("text-primary");
    $(".light-logo").hide();
    $(".dark-logo").show();
});

/*Card border/shadow*/
$(".cardborder").click(function() {
    $("body").addClass("cardwithborder");
    $(".cardshadow i").addClass("text-dark");
    $(".cardborder i").addClass("text-primary");
});
$(".cardshadow").click(function() {
    $("body").removeClass("cardwithborder");
    $(".cardborder i").removeClass("text-primary");
    $(".cardshadow i").removeClass("text-dark");
});

$(".change-colors li a").click(function() {
    $(".change-colors li a").removeClass("active-theme");
    $(this).addClass("active-theme");
});

/*Theme color change*/
function toggleTheme(value) {
    $(".preloader").show();
    var sheets = document.getElementById("themeColors");
    sheets.href = value;
    $(".preloader").fadeOut();
}
$(".preloader").fadeOut();


function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function formatDate(srcDateString, includeTime = true) {
    if (srcDateString === "") {
        return "";
    }
    var returnDate = "";
    srcDate = new Date(srcDateString);
    var month = ("0" + (srcDate.getMonth() + 1)).slice(-2);
    var day = ("0" + srcDate.getDate()).slice(-2);
    var year = srcDate.getFullYear();
    returnDate = year + "/" + month + "/" + day;
    if (includeTime) {
        var hour = ("0" + srcDate.getHours()).slice(-2);
        var min = ("0" + srcDate.getMinutes()).slice(-2);
        var seg = ("0" + srcDate.getSeconds()).slice(-2);
        returnDate = returnDate + " " + hour + ":" + min + ":" + seg;
    }
    return returnDate;
}

function formatDBDate(srcDateString = "", includeTime = true) {
    var srcDate = new Date();
    if (srcDateString !== "") {
        if (typeof srcDateString === "string") {
            if (srcDateString === "") {
                return "";
            }
            srcDate = new Date(
                srcDateString.split("/")[2],
                srcDateString.split("/")[1] - 1,
                srcDateString.split("/")[0],
                new Date().getHours(),
                new Date().getMinutes(),
                new Date().getSeconds()
            );
        } else if (typeof srcDateString === "object") {
            srcDate = new Date(srcDateString);
        }
    }
    var month = ("0" + (srcDate.getMonth() + 1)).slice(-2);
    var day = ("0" + srcDate.getDate()).slice(-2);
    var year = srcDate.getFullYear();
    if (includeTime) {
        var hour = ("0" + srcDate.getHours()).slice(-2);
        var min = ("0" + srcDate.getMinutes()).slice(-2);
        var seg = ("0" + srcDate.getSeconds()).slice(-2);
        return year + "-" + month + "-" + day + " " + hour + ":" + min + ":" + seg;
    }
    return year + "-" + month + "-" + day;
}

function getDateName(dateString) {
    var a = new Date(dateString);
    var days = new Array(7);
    days[0] = "日";
    days[1] = "月";
    days[2] = "火";
    days[3] = "水";
    days[4] = "木";
    days[5] = "金";
    days[6] = "土";
    return days[a.getDay()];
}

function getZipCodeAddess(zipCode) {
    $.getJSON("ajax.php?zipcode=" + zipCode, function(strData) {
        return strData[0][0];
    });
}