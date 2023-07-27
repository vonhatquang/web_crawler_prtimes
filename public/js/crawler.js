$(document).ready(function() {
    let fileName = '';
    $('#cancel').click(() => {
        location.href = $('input[name=url]').val();
    });

    $('#crawler-btn').click(() => {
        var searchKeyword = $("#searchKeyword").val();
		var myInterval = null;
        $(".error-div").addClass('hidden');
        if (searchKeyword === "") {
            $(".error-message").html("検索キーワードを入力してください。");
            $(".error-div").removeClass('hidden');
        } else {
            var searchKeywordLimit = parseInt($('input[name=count]').val());
            var searchKeywordArray = searchKeyword.split("\n").filter(function(searchKeyword) {
                return searchKeyword != null && searchKeyword != "";
            });
            if (searchKeywordArray.length > searchKeywordLimit) {
                $(".error-message").html("検索キーワードは、最大" + searchKeywordLimit + "行まで入力してください。");
                $(".error-div").removeClass('hidden');
            } else {
                $("#searchKeyword").attr("disabled", true);
                $("#crawler-btn").attr("disabled", true);
                var searchKeywordData = searchKeywordArray.length <= searchKeywordLimit ? searchKeywordArray : searchKeywordArray.slice(0, searchKeywordLimit);
                
				var csrf_token = $('input[name="_token"]:first').val();
				$.ajax({
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': csrf_token },
                    url: $('.process-url').val(),
                    data: 'searchKeyword=' + JSON.stringify(searchKeywordData),
					async:true,
                    beforeSend: function() {
                        $('body').addClass('wating');
                        $('.loader').removeClass('hidden');
                        $('.progress').removeClass('hidden');
						myInterval = setInterval(getProcessBarInfo, 1000);
                    },
                    success: function(data) {
                        responseJson = data;
						$('.progress').addClass('hidden');
						clearInterval(myInterval);
                    },
                    error: function(err) {
                        // console.log('Error' + JSON.stringify(err, null, 2));
                        responseJson = "";
						$('.progress').addClass('hidden');
						clearInterval(myInterval);
                    }
                }).done(function() {
                    $('body').removeClass('wating');
                    $('.loader').addClass('hidden');
					$('.progress').addClass('hidden');
                    $(".download").empty();
					clearInterval(myInterval);
                    if (responseJson !== "") {
                        var responseArray = jQuery.parseJSON(responseJson);
                        fileName = responseArray.DownloadFile;
                        var downloadFileName = "";
                        if (fileName.split("\\").length > 1) {
                            downloadFileName = fileName.split("\\").slice(-1);
                        } else {
                            downloadFileName = fileName.split("/").slice(-1);
                        }
                        let html =
                            '<a href=' + fileName + ' class="link me-3 download-search-result" style="display:none;"></a>' +
                            '<label style="color: blue;">' + downloadFileName + '</label> &nbsp;&nbsp;' +
                            '<a href="#" class="btn btn-danger download-file-btn">Download</a>';
                        $(".download").append(html);
                        $(".download-div").removeClass("hidden");

                        var now = new Date(responseArray.StartDate);
                        var then = new Date(responseArray.EndDate);
                        var minsDiff = Math.floor((then.getTime() - now.getTime()) / 1000 / 60);
                        var hoursDiff = Math.floor(minsDiff / 60);
                        minsDiff = minsDiff % 60;

                        // $(".error-message").removeClass('alert-danger').addClass('alert-success').html(
                        //     "実施検索キーワード数：" + responseArray.SearchKeywordsNum + "</br>" +
                        //     "開始時：" + responseArray.StartDate + "</br>" +
                        //     "終了時：" + responseArray.EndDate + "</br>"
                        // );
                        // $(".error-div").removeClass('hidden');
                    } else {
                        $(".error-message").html("検索処理はエラーが発生しています。");
                        $(".error-div").removeClass('hidden');
                    }
                });
            }
        }
    });
    $(document).on("click", "a.download-file-btn", function(e) {
        e.preventDefault();
        var downloadURL = "";
        if (fileName.split("\\").length > 1) {
            downloadURL = $("a.download-search-result").attr("href").split("\\").slice(-2);
        } else {
            downloadURL = $("a.download-search-result").attr("href").split("/").slice(-2);
        }
        window.location.href = downloadURL[0] + "/" + downloadURL[1];
		//window.location.href = $("a.download-search-result").attr("href");
    });
	function getProcessBarInfo(){
		var csrf_token = $('input[name="_token"]:first').val();
		$.ajax({
			type: 'POST',
			headers: { 'X-CSRF-TOKEN': csrf_token },
			url: $('.processing-url').val(),
			data: '',
			async:true,
			success: function(data) {
				responseJson = data;
			},
			error: function(err) {
				// console.log('Error' + JSON.stringify(err, null, 2));
				responseJson = "";
			}
		}).done(function() {
			if (responseJson !== "") {
				//$(".processing").html(responseJson);
				$('#dynamic').html(responseJson);
				//alert(responseJson);
			}
		});
	}
});