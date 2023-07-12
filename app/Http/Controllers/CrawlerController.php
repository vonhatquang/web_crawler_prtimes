<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class CrawlerController extends Controller
{
    public function index(){
        $processLogPath =  public_path('crawler_file/processLog.txt');
        return view('crawler')->with(compact('processLogPath'));
    }

    function crawlerProcess(Request $request){
        //Write Selected Search Keywords to file for Python Script
        $searchKeyWords = json_decode($request->searchKeyword,true);
        $textKeyWord = '';
        $startDateTime = date_format(Carbon::now(),"Y/m/d/ H:i:s");
        $currentDateTime = date_format(Carbon::now(),"YmdHisu");
        $searchKeywordFileName = $currentDateTime.'_searchKeywords'.'.txt';
        $searchResultFileName = $currentDateTime.'_PRTIMES'.'.xlsx';
        foreach ($searchKeyWords as $searchKeyWord) {
            $textKeyWord .= $searchKeyWord .PHP_EOL;
        }
        
        File::put(public_path('crawler_file/'.$searchKeywordFileName), $textKeyWord);

        //Prepare Python Script for Crawler Data
        $crawlerDataBatch = config('batch.crawler_data_batch');  
        if (!strpos(app_path(),"\\")) { 
            $crawlerDataBatch = str_replace("\\","/",$crawlerDataBatch);
        }        
        $directorySlash = "\\"; 
        if (!strpos(app_path(),"\\")) { 
            $directorySlash = "/";
        }
        $command = escapeshellcmd('python ' . app_path() .$crawlerDataBatch .' '.$currentDateTime.' '.public_path('crawler_file'.$directorySlash));
        dd($command);
        //Run Python Script for Crawler Data
        $output = shell_exec($command);
        //Convert Return from Python to Search Results File Name
        // $searchResultFileName = base64_decode($output);
        // $searchResultFileName = '情報収集(Google検索).xlsx';
        if ($output == null){
            return response("");
        }
        $endDateTime = date_format(Carbon::now(),"Y/m/d/ H:i:s");
        $processSecond = strtotime($endDateTime) - strtotime($startDateTime);
        $downloadFilePath = public_path('crawler_file'.$directorySlash.$searchResultFileName);
        $responseArray= array('SearchKeywordsNum' => count($searchKeyWords),'SearchItemsNum' => str_replace("\n","",$output),'ProcessSecond' => $processSecond,'StartDate' => $startDateTime, 'EndDate' => $endDateTime,'DownloadFile' => $downloadFilePath);
        //dd($responseArray);
        return response(json_encode($responseArray));
    }
}
