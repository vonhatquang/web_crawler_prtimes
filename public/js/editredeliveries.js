function showFinishEdit(alertTitle) {
    Swal.fire({
        position: "top-end",
        type: "success",
        title: alertTitle,
        showConfirmButton: false,
        timer: 1500000,
    });
};
$("#redeliveries-edit-form").on('submit', function(event) {
    event.preventDefault();
    $(".redeliveries-edit-info").find("#redelivery_time_name").val($("#redelivery_time_id").find(":selected").html());
    $(".redeliveries-edit-info").find("#status_name").val($("#status_id").find(":selected").html());
    $(".redeliveries-edit-info").find("#updated_at").val(formatDBDate(new Date()));
    // var id = $(".redeliveries-edit-info").find("#id").val();
    var url = $(this).attr('action');
    var csrf_token = $('input[name="_token"]:first').val();

    $.ajax({
        url: url,
        headers: { 'X-CSRF-TOKEN': csrf_token },
        method: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('body').addClass('wating');
            $('.loader').show();
        },
        success: function(response) {
            // searchRedeliveries();
            alert("再配達依頼が完了しました！")
            $("#redeliveriesEditModal").modal("hide");
            $('body').removeClass('wating');
            $('.loader').hide();
            // window.location.href = "/";
        },
        error: function(response) {
            alert('Error: ' + "入力エラー！　入力内容を確認してください。");
            $('body').removeClass('wating');
            $('.loader').hide();
        }
    });
});


$(document).on("click", "button.btn-redeliveries-edit-action", function(e) {
    $("#redeliveries-edit-form").submit();
    // showFinishEdit("再配達依頼が完了しました！");
});

$(document).ready(function() {

    $(".redeliveries-edit-info").find("#delivery_date").val(formatDate($(".redeliveries-edit-info").find("#delivery_date").val(), false) + "（" + getDateName($(".redeliveries-edit-info").find("#delivery_date").val()) + "）");
    // $(".redeliveries-edit-info").find("#delivery_driver").val($(".redeliveries-edit-info").find("#delivery_driver").val() + "様");
    $("#redeliveriesEditModal").modal("show");
});