<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Simple CMS"/>
    <meta name="author" content="Sheikh Heera"/>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <title>LaraPress</title>
    <script src="{{ asset('jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased">
<div class="container mt-5 keywords">
    {!! Form::open(['method' => 'post', 'route' => 'crawler.process']) !!}
    @csrf
    @php
        $keywords = config('keyword');
    @endphp
    @foreach ($keywords as $key => $keyword)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="{{$key}}">
            <label class="form-check-label" for="{{$key}}">
                {{ $keyword }}
            </label>
        </div>
    @endforeach
</div>
<div class="text-center mt-3">
    <button type="submit" class="btn btn-primary" id="crawler1-btn">Submit</button>
    <input type="button" value="Replace Message" onclick='crawlerProcess()'>
    <a href="{{ route('crawler.process') }}" id="crawler-btn" class="btn btn-primary">Webスクレイピング実行
        クリア</a>
    {!! Form::close() !!}
</div>
<div class="text-center container download mt-3">
</div>
<script>

    function crawlerProcess(){
        $.ajax({
            type:'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url:'http://localhost:8080/crawler/Source/web_crawler/public/',
            data:'_token = <?php echo csrf_token() ?>',
            "dataType": "json",
            "contentType": 'application/json; charset=utf-8',
            success:function(data){
                $("p").append(" <b>Appended text</b>.");
                $("#msg").html(data.msg);
            }
        });
    }
    $(document).ready(function () {
        $('#crawler1-btn').on('submit',function(e){
            e.preventDefault();
        })
        let count = 0
        $("#crawler-btn").click(function () {
            count++;
            if (count == 3) {
                $("#crawler-btn").addClass("disable-btn");
            } else {
                function crawlerProcess(){
                    alert(111);
                    $.ajax({
                        type:'POST',
                        url:'/getmsg',
                        data:'_token = <?php echo csrf_token() ?>',
                        success:function(data){
                            $("#msg").html(data.msg);
                        }
                    });
                }
            }
        });
    });
</script>
</body>
</html>
