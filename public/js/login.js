$(".table-redeliveries").on("click", ".btn-redeliveries-notification", function(e) {
    UpdateQRCode("Hello World...");
    $("#qrModal").modal("show");
});

function UpdateQRCode(val) {
    $("#qrcode").attr("src", "https://api.mimfa.net/qrcode?value=" + encodeURIComponent(val) + "&as=value");
}

$(".table-redeliveries").on("click", ".btn-redeliveries-detail", function(e) {
    $("#redeliveriesDetailModal").modal("show");
});
$(document).on("click", "button.btn-redeliveries-add", function(e) {
    $("#redeliveriesAddModal").modal("show");
});