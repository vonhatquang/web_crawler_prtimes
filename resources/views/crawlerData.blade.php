<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Simple CMS"/>
    <meta name="author" content="Sheikh Heera"/>
    <meta name="csrf_token" content="{{ csrf_token() }}"/>
    <title>情報収集(Google検索)</title>
    <script src="{{ asset('jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased">
    <div class="loader hidden">
        <div class="loading">
        </div>
    </div>

    <div class="container keywords">
        <h1 class="mb-2 text-center title fixed-top">Google検索キーワード</h1>
        <div class="row justify-content-center">
            <div class="col-6">
                <input type="hidden" name="url" value="<?php echo url()->current();?>/">
                <input type="hidden" name="count" value="<?php echo config('app.limit_submit');?>"> 
                <textarea class="form-control" id="searchKeyword" row="100" style="min-height:300px!important;max-height:300px!important"></textarea>
            </div> 
        </div>        
        <div class="row error-div hidden">
            <div class="col-6 container" style="margin-top:10px !important">
                <div class="alert alert-danger error-message" role="alert" style="text-align: center;">
                    A simple danger alert—check it out!
                </div>      
            </div> 
        </div>    
        <div class="row download-div hidden">
            <div class="col-6 container download" style="margin-top:10px !important; margin-left:400px !important">
            </div> 
        </div> 
        <div class="row">
            <div class="col-3 container" style="margin-top:10px !important">
                <input type="button" value="クリア" id="cancel" class="btn btn-secondary">  
                <input type="button" value="Webスクレイピング実行" id="crawler-btn" class="btn btn-primary">      
            </div> 
        </div> 
    </div>   
    <script type="text/javascript" src="{{ asset('js/crawler.js') }}"></script>
</body>
</html>
