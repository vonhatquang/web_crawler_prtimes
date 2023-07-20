function ShowElement(elements) {
    $.each(elements, function(key, element) {
        $(element).removeClass("hidden-div");
    });
}

function HideElement(elements) {
    $.each(elements, function(key, element) {
        $(element).addClass("hidden-div");
    });
}

// function setTableRowBackgroundColor(tr, trType) {
//     var $tableBody = $(".table-redeliveries").find("tbody");
//     $tableBody.find("tr").removeClass("odd").removeClass("even");
//     $(tr).addClass(trType);

// }

function setDataToTableRedeliveries(results) {
    // var results = searchListResults;
    var $tableBody = $(".table-redeliveries").find("tbody");
    $.each($tableBody.find("tr"), function(tr) {
        if (!$(this).hasClass("template-data-row1") && !$(this).hasClass("template-data-row2")) {
            $(this).remove();
        }
    });
    if (results !== undefined && results.length > 0) {
        var itemCount = 0;
        var trType = "";
        $.each(results, function(index, value) {
            itemCount += 1;
            trType = "";
            if (itemCount % 2 !== 0) {
                trType = "odd";
            }
            var $tableBody = $(".table-redeliveries").find("tbody"),
                $trLast1 = $tableBody.find("tr.template-data-row1"),
                $trLast2 = $tableBody.find("tr.template-data-row2"),
                $trNew1 = $trLast1.clone(),
                $trNew2 = $trLast2.clone();

            $trNew1.find("td.search_item_no").html(itemCount).addClass(trType);
            $trNew1.find("td.search_requester_name").html(value.requester_name).addClass(trType);
            $trNew1.find("td.search_pickup_zipcode").html(value.pickup_zipcode + " " + (value.pickup_add1 === null ? "" : value.pickup_add1)).addClass(trType);
            $trNew1.find("td.search_quantity").html(value.quantity).addClass(trType);
            $trNew1.find("td.search_package_type_name").html(value.package_type_name).addClass(trType);
            $trNew1.find("td.search_delivery_date").html(value.delivery_date_display).addClass(trType);
            $trNew1.find("td.search_redelivery_date").html(value.redelivery_date === null ? "" : formatDate(value.redelivery_date, false) + "（" + getDateName(value.redelivery_date) + "）").addClass(trType);
            $trNew1.find("td.search_redelivery_time_name").html(value.redelivery_time_name === null ? "" : value.redelivery_time_name).addClass(trType);
            $trNew1.find("td.action").addClass(trType);
            $trNew1.find("td.action > input.id").val(value.id);
            $trNew1.removeClass("template-data-row1");
            $trLast1.before($trNew1);
            $trNew1.show();
            // setTableRowBackgroundColor($trNew1, trType);
            $trNew2.find("td.search_delivery_name").html(value.delivery_name === undefined || value.delivery_name === null || value.delivery_name === "" ? "" : value.delivery_name + " 様").addClass(trType);
            $trNew2.find("td.search_delivery_zipcode").html(value.delivery_zipcode + " " + (value.delivery_add1 === null ? "" : value.delivery_add1)).addClass(trType);
            $trNew2.find("td.search_fare_amount").html(value.fare_amount).addClass(trType);
            $trNew2.find("td.search_delivery_driver").html(value.delivery_driver).addClass(trType);
            $trNew2.find("td.search_status_name").html(value.status_name).addClass(trType);
            $trNew2.find("td.search_note").html(value.note).addClass(trType);
            $trNew2.removeClass("template-data-row2");
            $trLast1.before($trNew2);
            $trNew2.show();
            // setTableRowBackgroundColor($trNew2, trType);
        });
        // setTableRowBackgroundColor("table-redeliveries");
    }
}

function searchRedeliveries() {
    var url = $(".list-redeliveries-url:first").val();
    var csrf_token = $('input[name="_token"]:first').val();
    $.ajax({
        url: url,
        headers: { 'X-CSRF-TOKEN': csrf_token },
        method: 'POST',
        data: "",
        /*dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,*/
        beforeSend: function() {
            $('body').addClass('wating');
            $('.loader').show();
        },
        success: function(response) {
            setDataToTableRedeliveries(response);
            $('body').removeClass('wating');
            $('.loader').hide();
        },
        error: function(response) {
            alert('Error: ' + response.responseJSON.message);
            $('body').removeClass('wating');
            $('.loader').hide();
        }
    });
}

$(".table-redeliveries").on("click", ".btn-redeliveries-notification", function(event) {
    event.preventDefault();
    var $column = $(this).closest("td");
    var $row = $($column).closest("tr");
    var id = $row.find(".id").val();
    var url = $row.find(".get-redeliveries-url").val();
    var editurl = $row.find(".edit-redeliveries-url").val();
    var csrf_token = $('input[name="_token"]:first').val();

    $.ajax({
        url: url,
        headers: { 'X-CSRF-TOKEN': csrf_token },
        method: 'POST',
        data: 'redeliveriesId=' + id,
        /*dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,*/
        beforeSend: function() {
            $('body').addClass('wating');
            $('.loader').show();
        },
        success: function(response) {
            CreateQRCode(editurl, setQRModalInfo(response));
            $("#qrModal").modal("show");
            $('body').removeClass('wating');
            $('.loader').hide();
        },
        error: function(response) {
            alert('Error: ' + response.responseJSON.message);
            $('body').removeClass('wating');
            $('.loader').hide();
        }
    });
});

function setQRModalInfo(result) {
    $("#qrModal").find("#id").val(result[0].id);
    $("#qrModal").find("#package_code").html(result[0].package_code);
    $("#qrModal").find("#delivery_date_name").html(formatDate(result[0].delivery_date, false) + "（" + getDateName(result[0].delivery_date) + "）");
    $("#qrModal").find("#redelivery_date_name").html(result[0].redelivery_date === null ? "" : formatDate(result[0].redelivery_date, false) + "（" + getDateName(result[0].redelivery_date) + "）");
    // $("#qrModal").find("#storage_period_name").html(formatDate(result.storage_period, false));
    $("#qrModal").find("#storage_period_name").html(result[0].storage_period);
    $("#qrModal").find("#delivery_driver_name").html(result[0].delivery_driver_name);
    $("#qrModal").find("#redelivery_time_name").html(result[0].redelivery_time_name);
    $("#qrModal").find("#pickup_zipcode").html(result[0].pickup_zipcode);
    $("#qrModal").find("#delivery_zipcode").html(result[0].delivery_zipcode);
    $("#qrModal").find("#package_type_name").html(result[0].package_type_name);
    $("#qrModal").find("#quantity").html(result[0].quantity);
    $("#qrModal").find("#status_name").val(result[0].status_name);
    $("#qrModal").find(".redelivery_date_display").hide();
    $("#qrModal").find("#status_id option").filter(function(i, e) { return $(e).val().indexOf(result[0].status_id) > -1 }).prop('selected', true);
    if ((result[0].redelivery_date !== undefined && result[0].redelivery_date !== null && result[0].redelivery_date !== "") &&
        (result[0].redelivery_time_id !== undefined && result[0].redelivery_time_id !== null && result[0].redelivery_time_id !== "")
    ) {
        $("#qrModal").find("#redelivery_date_name").html(result[0].redelivery_date_name);
        $("#qrModal").find("#redelivery_time_name").html(result[0].redelivery_time_name);
        $("#qrModal").find(".redelivery_date_display").show();
    }
    return result[0].uuid;
}

function CreateQRCode(editurl, id) {

    //jQuery('#qrcode').qrcode("this plugin is great");
    $('#qrcodeCanvas').find('canvas').remove();
    $('#qrcodeCanvas').qrcode({ text: editurl + id });
    $('#qrcodeCanvas').find('canvas').css("width", "100px");
    $('#qrcodeCanvas').find('canvas').css("height", "100px");
    $("#qrModal").find("#update_redeliveries_url").html(editurl + id);
    // canvas = $("#qrModal").find("#qrcode_canvas");
    // QRCode.toCanvas(canvas, editurl + id, error => {

    //     if (error) {

    //         console.error(error); // エラーになった場合

    //     }

    // });
    // var url = $row.find(".edit-redeliveries-url").val();
    // $("#qrcode").attr("src", "https://api.mimfa.net/qrcode?value=" + encodeURIComponent(editurl + id) + "&as=value");
}

function setDetailinfo(response, displayPart, editMode = false) {
    $(displayPart).find("#id").val(response[0].id);
    $(displayPart).find("#project_title").val(response[0].project_title);
    $(displayPart).find("#requester_name").val(response[0].requester_name);
    $(displayPart).find("#pickup_zipcode").val((editMode ? "" : "〒") + response[0].pickup_zipcode);
    $(displayPart).find("#pickup_add1").val(response[0].pickup_add1);
    $(displayPart).find("#pickup_add2").val(response[0].pickup_add2);
    $(displayPart).find("#pickup_tel").val((editMode ? "" : "Tel ") + response[0].pickup_tel);
    $(displayPart).find("#delivery_zipcode").val((editMode ? "" : "〒") + response[0].delivery_zipcode);
    $(displayPart).find("#delivery_add1").val(response[0].delivery_add1);
    $(displayPart).find("#delivery_add2").val(response[0].delivery_add2);
    $(displayPart).find("#delivery_tel").val((editMode ? "" : "Tel ") + response[0].delivery_tel);
    $(displayPart).find("#delivery_name").val(response[0].delivery_name);

    var date;
    var nd;
    if (editMode && response[0].delivery_date !== null) {
        date = new Date(response[0].delivery_date);
        // alert('the original date is ' + date);
        var newdate = new Date(date);

        newdate.setDate(newdate.getDate() + 1); // minus the date

        nd = new Date(newdate);
        // alert('the new date is ' + nd);
    }


    $(displayPart).find("#delivery_date").val(editMode ? (response[0].delivery_date === null ? "" : nd.toISOString().split('T')[0]) : response[0].delivery_date_display);
    $(displayPart).find("#package_type").val(response[0].package_type);
    $(displayPart).find("#package_type_name").val(response[0].package_type_name);
    $(displayPart).find("#quantity").val(response[0].quantity);
    $(displayPart).find("#fare_amount").val(response[0].fare_amount);
    $(displayPart).find("#delivery_driver").val(response[0].delivery_driver);
    $(displayPart).find("#status_id").val(response[0].status_id);
    $(displayPart).find("#status_name").val(response[0].status_name);
    $(displayPart).find("#package_code").val(response[0].package_code);
    $(displayPart).find("#storage_period").val(response[0].storage_period);
    $(displayPart).find("#redelivery_date").val(response[0].redelivery_date === null ? "" : formatDate(response[0].redelivery_date, false) + "（" + getDateName(response[0].redelivery_date) + "）");
    $(displayPart).find("#redelivery_time_name").val(response[0].redelivery_time_name === null ? "" : response[0].redelivery_time_name);
    $(displayPart).find("#note").val(response[0].note);
    $(displayPart).find("#updated_at_display").val(formatDate(response[0].updated_at));
    $(displayPart).find("#updated_at").val(formatDate(response[0].updated_at));
    $(displayPart).find("#deleted_at").val(response[0].deleted_at === undefined || response[0].deleted_at === null || response[0].deleted_at === "" ? "" : formatDate(response[0].deleted_at));

}

$(".table-redeliveries").on("click", ".btn-redeliveries-detail", function(event) {
    event.preventDefault();
    var $column = $(this).closest("td");
    var $row = $($column).closest("tr");
    var id = $row.find(".id").val();
    var url = $row.find(".get-redeliveries-url").val();
    var csrf_token = $('input[name="_token"]:first').val();
    formData = new FormData();
    formData.append('redeliveriesId', id);
    $.ajax({
        url: url,
        headers: { 'X-CSRF-TOKEN': csrf_token },
        method: 'POST',
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('body').addClass('wating');
            $('.loader').show();
        },
        success: function(response) {
            if (response.length > 0) {
                setDetailinfo(response, $(".redeliveries-detail-info"));
                setDetailinfo(response, $(".redeliveries-edit-info"), true);
                $("#redeliveriesDetailModal").find("#editMode").prop("checked", false);
                $("#redeliveriesDetailModal").find(".redeliveries-detail-info").show();
                $("#redeliveriesDetailModal").find(".redeliveries-edit-info").hide();
                $("#redeliveriesDetailModal").find(".btn-redeliveries-update-action").hide();
                $("#redeliveriesDetailModal").find(".btn-redeliveries-delete-action").hide();
                $("#redeliveriesDetailModal").modal("show");
            }
            $('body').removeClass('wating');
            $('.loader').hide();
        },
        error: function(response) {
            alert('Error: ' + response.responseJSON.message);
            $('body').removeClass('wating');
            $('.loader').hide();
        }
    });
});

$('#editMode').change(function() {
    if ($(this).is(':checked')) {
        $("#redeliveriesDetailModal").find(".redeliveries-detail-info").hide();
        $("#redeliveriesDetailModal").find(".redeliveries-edit-info").show();
        $("#redeliveriesDetailModal").find(".btn-redeliveries-update-action").show();
        $("#redeliveriesDetailModal").find(".btn-redeliveries-delete-action").show();
    } else {
        $("#redeliveriesDetailModal").find(".redeliveries-detail-info").show();
        $("#redeliveriesDetailModal").find(".redeliveries-edit-info").hide();
        $("#redeliveriesDetailModal").find(".btn-redeliveries-update-action").hide();
        $("#redeliveriesDetailModal").find(".btn-redeliveries-delete-action").hide();
    }
});

$(document).on("click", "button.btn-redeliveries-add", function(event) {
    event.preventDefault();
    $("#redeliveriesAddModal").modal("show");
});

$("#redeliveries-add-form").on('submit', function(event) {
    event.preventDefault();
    $(".redeliveries-add-info").find("#package_type_name").val($(".redeliveries-add-info").find("#package_type").find(":selected").html());
    $(".redeliveries-add-info").find("#status_name").val($(".redeliveries-add-info").find("#status_id").find(":selected").html());
    $(".redeliveries-add-info").find("#delivery_date_display").val(formatDate($(".redeliveries-add-info").find("#delivery_date").val(), false) + "（" + getDateName($(".redeliveries-add-info").find("#delivery_date").val()) + "）");
    // $(".redeliveries-add-info").find("#delivery_driver_display").val($(".redeliveries-add-info").find("#delivery_driver").val());
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
            searchRedeliveries();
            $("#redeliveriesAddModal").modal("hide");
            $('body').removeClass('wating');
            $('.loader').hide();
        },
        error: function(response) {
            // alert('Error: ' + response.responseJSON.message);           
            alert('Error: ' + "入力エラー！　入力内容を確認してください。");
            $('body').removeClass('wating');
            $('.loader').hide();
        }
    });
});


$(document).on("click", "button.btn-redeliveries-add-action", function(e) {
    $("#redeliveries-add-form").submit();
});



$("#redeliveries-edit-form").on('submit', function(event) {
    event.preventDefault();
    $(".redeliveries-edit-info").find("#updated_at").val(formatDBDate(new Date()));
    if ($(".redeliveries-edit-info").find("#editAction").val() === "0") {
        $(".redeliveries-edit-info").find("#package_type_name").val($(".redeliveries-edit-info").find("#package_type").find(":selected").html());
        $(".redeliveries-edit-info").find("#status_name").val($(".redeliveries-edit-info").find("#status_id").find(":selected").html());
        $(".redeliveries-edit-info").find("#delivery_date_display").val(formatDate($(".redeliveries-edit-info").find("#delivery_date").val(), false) + "（" + getDateName($(".redeliveries-edit-info").find("#delivery_date").val()) + "）");

    }
    var url = $(".redeliveries-edit-info").find("#editAction").val() === "0" ? $(".redeliveries-edit-info").find("#updateAction").val() : $(".redeliveries-edit-info").find("#deleteAction").val();
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
            searchRedeliveries();
            $("#redeliveriesDetailModal").modal("hide");
            $('body').removeClass('wating');
            $('.loader').hide();
        },
        error: function(response) {
            // alert('Error: ' + response.responseJSON.message);           
            alert('Error: ' + "入力エラー！　入力内容を確認してください。");
            $('body').removeClass('wating');
            $('.loader').hide();
        }
    });
});

$(document).on("click", "button.btn-redeliveries-update-action", function(e) {
    $(".redeliveries-edit-info").find("#editAction").val("0");
    $("#redeliveries-edit-form").submit();
});

$(document).on("click", "button.btn-redeliveries-delete-action", function(e) {
    $("#deleteModal").modal("show");
});

$(document).on("click", "button.btn-delete-ok", function(e) {
    $(".redeliveries-edit-info").find("#editAction").val("1");
    $("#redeliveries-edit-form").submit();
    $("#deleteModal").modal("hide");
});

$(".redeliveries-add-info").on("focusout", "#pickup_zipcode", function() {
    var zipcode = $(this).val();
    if (zipcode.length === 7 && $(".redeliveries-add-info").find("#pickup_add1").val() === "") {
        $(".redeliveries-add-info").find('input[name="add_pickup_zipcode_1"]').val(zipcode.substring(0, 3));
        $(".redeliveries-add-info").find('input[name="add_pickup_zipcode_2"]').val(zipcode.substring(zipcode.length - 4));
        AjaxZip3.zip2addr('add_pickup_zipcode_1', 'add_pickup_zipcode_2', 'add_pickup_zipcode_pref', 'add_pickup_zipcode_address_1', 'add_pickup_zipcode_address_2');
        setTimeout(function() {
            var add_pickup_zipcode_pref = $(".redeliveries-add-info").find('input[name="add_pickup_zipcode_pref"]').val();
            var add_pickup_zipcode_address_1 = $(".redeliveries-add-info").find('input[name="add_pickup_zipcode_address_1"]').val();
            var add_pickup_zipcode_address_2 = $(".redeliveries-add-info").find('input[name="add_pickup_zipcode_address_2"]').val();
            $(".redeliveries-add-info").find("#pickup_add1").val(add_pickup_zipcode_pref + " " + add_pickup_zipcode_address_1 + " " + add_pickup_zipcode_address_2);
        }, 500);

    }
});

$(".redeliveries-add-info").on("focusout", "#delivery_zipcode", function() {
    var zipcode = $(this).val().replace("-", "");
    if (zipcode.length === 7 && $(".redeliveries-add-info").find("#delivery_add1").val() === "") {
        $(".redeliveries-add-info").find('input[name="add_delivery_zipcode_1"]').val(zipcode.substring(0, 3));
        $(".redeliveries-add-info").find('input[name="add_delivery_zipcode_2"]').val(zipcode.substring(zipcode.length - 4));
        AjaxZip3.zip2addr('add_delivery_zipcode_1', 'add_delivery_zipcode_2', 'add_delivery_zipcode_pref', 'add_delivery_zipcode_address_1', 'add_delivery_zipcode_address_2');
        setTimeout(function() {
            var add_delivery_zipcode_pref = $(".redeliveries-add-info").find('input[name="add_delivery_zipcode_pref"]').val();
            var add_delivery_zipcode_address_1 = $(".redeliveries-add-info").find('input[name="add_delivery_zipcode_address_1"]').val();
            var add_delivery_zipcode_address_2 = $(".redeliveries-add-info").find('input[name="add_delivery_zipcode_address_2"]').val();
            $(".redeliveries-add-info").find("#delivery_add1").val(add_delivery_zipcode_pref + " " + add_delivery_zipcode_address_1 + " " + add_delivery_zipcode_address_2);
        }, 500);

    }
});

$(".redeliveries-edit-info").on("focusout", "#pickup_zipcode", function() {
    var zipcode = $(this).val().replace("-", "");
    if (zipcode.length === 7 && $(".redeliveries-edit-info").find("#pickup_add1").val() === "") {
        $(".redeliveries-edit-info").find('input[name="edit_pickup_zipcode_1"]').val(zipcode.substring(0, 3));
        $(".redeliveries-edit-info").find('input[name="edit_pickup_zipcode_2"]').val(zipcode.substring(zipcode.length - 4));
        AjaxZip3.zip2addr('edit_pickup_zipcode_1', 'edit_pickup_zipcode_2', 'edit_pickup_zipcode_pref', 'edit_pickup_zipcode_address_1', 'edit_pickup_zipcode_address_2');
        setTimeout(function() {
            var edit_pickup_zipcode_pref = $(".redeliveries-edit-info").find('input[name="edit_pickup_zipcode_pref"]').val();
            var edit_pickup_zipcode_address_1 = $(".redeliveries-edit-info").find('input[name="edit_pickup_zipcode_address_1"]').val();
            var edit_pickup_zipcode_address_2 = $(".redeliveries-edit-info").find('input[name="edit_pickup_zipcode_address_2"]').val();
            $(".redeliveries-edit-info").find("#pickup_add1").val(edit_pickup_zipcode_pref + " " + edit_pickup_zipcode_address_1 + " " + edit_pickup_zipcode_address_2);
        }, 500);

    }
});

$(".redeliveries-edit-info").on("focusout", "#delivery_zipcode", function() {
    var zipcode = $(this).val().replace("-", "");
    if (zipcode.length === 7 && $(".redeliveries-edit-info").find("#delivery_add1").val() === "") {
        $(".redeliveries-edit-info").find('input[name="edit_delivery_zipcode_1"]').val(zipcode.substring(0, 3));
        $(".redeliveries-edit-info").find('input[name="edit_delivery_zipcode_2"]').val(zipcode.substring(zipcode.length - 4));
        AjaxZip3.zip2addr('edit_delivery_zipcode_1', 'edit_delivery_zipcode_2', 'edit_delivery_zipcode_pref', 'edit_delivery_zipcode_address_1', 'edit_delivery_zipcode_address_2');
        setTimeout(function() {
            var edit_delivery_zipcode_pref = $(".redeliveries-edit-info").find('input[name="edit_delivery_zipcode_pref"]').val();
            var edit_delivery_zipcode_address_1 = $(".redeliveries-edit-info").find('input[name="edit_delivery_zipcode_address_1"]').val();
            var edit_delivery_zipcode_address_2 = $(".redeliveries-edit-info").find('input[name="edit_delivery_zipcode_address_2"]').val();
            $(".redeliveries-edit-info").find("#delivery_add1").val(edit_delivery_zipcode_pref + " " + edit_delivery_zipcode_address_1 + " " + edit_delivery_zipcode_address_2);
        }, 500);

    }
});


$("#qr-redeliveries-edit-form").on('submit', function(event) {
    event.preventDefault();
    $("#qrModal").find("#status_name").val($("#qrModal").find("#status_id").find(":selected").html());
    $("#qrModal").find("#updated_at").val(formatDBDate(new Date()));
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
            $("#qrModal").modal("hide");
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


$(document).on("click", "button.btn-qr-redeliveries-edit-action", function(e) {
    $("#qr-redeliveries-edit-form").submit();
    // showFinishEdit("再配達依頼が完了しました！");
});

$(document).ready(function() {
    searchRedeliveries();
});