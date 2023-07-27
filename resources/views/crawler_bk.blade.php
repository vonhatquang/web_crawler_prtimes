<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Simple CMS"/>
    <meta name="author" content="Sheikh Heera"/>
    <meta name="csrf_token" content="{{ csrf_token() }}"/>
    <title>情報収集(PRTIMES)</title>
    <script src="{{ asset('jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased"> 
    @csrf
	<div class="loader hidden">
		<div class="col-12"> 
			<div class="row">
				<div class="col-5"></div>
				<div class="col-2 loading"></div>
				<div class="col-5"></div>
				<div class="col-12 processing" style="text-align:center;font-size:large;"></div>
			</div>	
		</div>
    </div>

    <div class="container keywords">
        <div class="row justify-content-center">
            <div class="col-12">   
                <h1 class="text-center title fixed-top" style="margin-top:60px !important;">情報収集(PRTIMES)</h1>
            </div> 
        </div> 
        <div class="row justify-content-center">
            <div class="col-2">   
                <h3 class="mb-2 text-left title" style="margin-left: -220px;">検索キーワード</h3>   
            </div> 
        </div> 
        <div class="row justify-content-center">
            <div class="col-6">			
                <input type="hidden" name="url" value="<?php echo url()->current();?>/">
                <input type="hidden" class="process-url" value="{{ route('crawler.process') }}">
                <input type="hidden" class="processing-url" value="{{ route('crawler.processing') }}">
                <input type="hidden" name="count" value="<?php echo config('app.limit_submit');?>"> 
                <textarea class="form-control" id="searchKeyword" row="100" style="min-height:300px!important;max-height:300px!important"></textarea>
            </div> 
        </div>        
        <div class="row justify-content-center error-div hidden">
            <div class="col-6 container" style="margin-top:10px !important">
                <div class="alert alert-danger error-message" role="alert" style="text-align: center;">
                    A simple danger alert—check it out!
                </div>      
            </div> 
        </div>
		<div class="row justify-content-center progress hidden" style="height: 50px !important;background-color: transparent;">
			<div id="dynamic" style="text-align:center;font-size:large; " class="col-6 container progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width: 0%">
			</div>
		</div>
        <div class="row justify-content-center">
            <div class="col-6 container" style="margin-top:10px !important">
                <input type="button" value="クリア" id="cancel" class="btn btn-secondary">  
                <input type="button" value="Webスクレイピング実行" id="crawler-btn" class="btn btn-primary">      
            </div> 
        </div>     
        <div class="row justify-content-left download-div hidden">
            <div class="col-6 container download" style="margin-top:10px !important;">
            </div> 
        </div> 
    </div>   
    <script type="text/javascript" src="{{ asset('js/crawler.js') }}"></script>
</body>
</html>
