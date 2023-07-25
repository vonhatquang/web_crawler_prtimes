<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CrawlerController extends Controller
{
    public function index(){
        if(Auth::check()){
            // $redeliveries = Redeliveries::orderBy('delivery_date','asc')->get();
            // return view('redeliveries')->with(compact('redeliveries'));
            return view('crawler');
        }
        return redirect("login");
    }

	function crawlerProcessing(Request $request){
		$contents = Storage::disk('local')->get('crawler_file/processLog.txt');
		$array = preg_split("/\r\n|\n|\r/", $contents);
        return response($array[count($array)-1]);
    }
    function crawlerProcess(Request $request){
		Storage::disk('local')->put('crawler_file/processLog.txt', '処理中');

        //Write Selected Search Keywords to file for Python Script
        $textKeyWord = '';
        $searchKeyWords = json_decode($request->searchKeyword,true);
		
        $startDateTime = date_format(Carbon::now(),"Y/m/d/ H:i:s");
        $currentDateTime = date_format(Carbon::now(),"YmdHisu");
		
		
		$processLogFilePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'crawler_file/';
		$seachKeywordPath = public_path('crawler_file/');
		$searchKeywordFileName = $seachKeywordPath.$currentDateTime.'_searchKeywords'.'.txt';
		$searchResultFileName = $seachKeywordPath.$currentDateTime.'_PRTIMES'.'.xlsx';
		
        foreach ($searchKeyWords as $searchKeyWord) {
            $textKeyWord .= $searchKeyWord .PHP_EOL;
        }
        
        File::put($searchKeywordFileName, $textKeyWord);
        //Prepare Python Script for Crawler Data
        $crawlerDataBatch = config('batch.crawler_data_batch');  
        if (!strpos(app_path(),"\\")) { 
            $crawlerDataBatch = str_replace("\\","/",$crawlerDataBatch);
        }        
        $directorySlash = "\\"; 
        if (!strpos(app_path(),"\\")) { 
            $directorySlash = "/";
        }        
		$runScript = 'python ' . app_path() .$crawlerDataBatch ;
		$parameter1 = ' '.$currentDateTime;		
		$parameter2 = ' '.$seachKeywordPath;	
		$parameter3 = ' '.$processLogFilePath;
        $command = escapeshellcmd($runScript.$parameter1.$parameter2.$parameter3);
		//echo($command);
        //Run Python Script for Crawler Data
        $output = shell_exec($command);
        //Convert Return from Python to Search Results File Name
        // $searchResultFileName = base64_decode($output);
        // $searchResultFileName = '情報収集(Google検索).xlsx';
        if ($output == null){
            return response("");
        }
        $endDateTime = date_format(Carbon::now(),"Y/m/d/ H:i:s");
        $downloadFilePath = $searchResultFileName;
        $responseArray= array('SearchKeywordsNum' => count($searchKeyWords),'StartDate' => $startDateTime, 'EndDate' => $endDateTime,'DownloadFile' => $downloadFilePath);
        return response(json_encode($responseArray));
    }
}
