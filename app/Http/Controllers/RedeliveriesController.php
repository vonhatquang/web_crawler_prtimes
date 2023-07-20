<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Redeliveries;
use Carbon\Carbon;
use Illuminate\Support\Str;

class RedeliveriesController extends Controller
{
    public function index(){
        if(Auth::check()){
            // $redeliveries = Redeliveries::orderBy('delivery_date','asc')->get();
            // return view('redeliveries')->with(compact('redeliveries'));
            return view('redeliveries');
        }
        return redirect("login");
    }

    public function listRedeliveries(Request $request) { 
        return  Redeliveries::
            where(
                function($query) {
                    return $query
                        ->whereNull('deleted_at')
                        ->orWhere('deleted_at', '', '')
                        ;
                }
            )
            ->get();
    }

    public function getRedeliveries(Request $request) {
        if ($request->redeliveriesId) {
            return Redeliveries::where('id', '=', $request->redeliveriesId)->get();
        
        } 
        return null;
    }

    public function postRedeliveries(Request $request) { 
        $data = $request->all();
        $check = Redeliveries::create([
            'uuid' => Str::uuid()->toString(),
            'project_title' => $data['project_title'],
            'requester_name' => $data['requester_name'],
            'pickup_zipcode' => $data['pickup_zipcode'],
            'pickup_add1' => $data['pickup_add1'],
            'pickup_add2' => $data['pickup_add2'],
            'pickup_tel' => $data['pickup_tel'],
            'delivery_zipcode' => $data['delivery_zipcode'],
            'delivery_add1' => $data['delivery_add1'],
            'delivery_add2' => $data['delivery_add2'],
            'delivery_tel' => $data['delivery_tel'],
            'delivery_name' => $data['delivery_name'],
            'delivery_date' => $data['delivery_date'],
            'delivery_date_display' => $data['delivery_date_display'],
            'package_type' => $data['package_type'],
            'package_type_name' => $data['package_type_name'],
            'quantity' => $data['quantity'],
            'fare_amount' => $data['fare_amount'],
            'delivery_driver' => $data['delivery_driver'],
            // 'delivery_driver_display' => $data['delivery_driver_display'],
            'status_id' => $data['status_id'],
            'status_name' => $data['status_name'],
            'package_code' => $data['package_code'],
            'storage_period' => $data['storage_period'],
            'note' => $data['note'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ]);
         
        return response($check);
    }

    public function deleteRedeliveries(Request $request ) {
        // return $request;
        $redeliveries = Redeliveries::find($request->id);  
        // $redeliveries->deleted_flg = 1; 
        $redeliveries->deleted_at = $request->updated_at; 
        $redeliveries->updated_at = $request->updated_at;
        $redeliveries->save();
        return $redeliveries;//redirect()->action('RedeliveriesController@index');
    }

    public function updateRedeliveries(Request $request ) {
        // return $request;
        $redeliveries = Redeliveries::find($request->id);        
        $redeliveries->project_title = $request->project_title;
        $redeliveries->requester_name = $request->requester_name;
        $redeliveries->pickup_zipcode = $request->pickup_zipcode;
        $redeliveries->pickup_add1 = $request->pickup_add1;
        $redeliveries->pickup_add2 = $request->pickup_add2;
        $redeliveries->pickup_tel = $request->pickup_tel;
        $redeliveries->delivery_zipcode = $request->delivery_zipcode;
        $redeliveries->delivery_add1 = $request->delivery_add1;
        $redeliveries->delivery_add2 = $request->delivery_add2;
        $redeliveries->delivery_tel = $request->delivery_tel;
        $redeliveries->delivery_name = $request->delivery_name;
        $redeliveries->delivery_date = $request->delivery_date;
        $redeliveries->delivery_date_display = $request->delivery_date_display;
        $redeliveries->package_type = $request->package_type;
        $redeliveries->package_type_name = $request->package_type_name;
        $redeliveries->quantity = $request->quantity;
        $redeliveries->fare_amount = $request->fare_amount;
        $redeliveries->delivery_driver = $request->delivery_driver;
        $redeliveries->status_id = $request->status_id;
        $redeliveries->status_name = $request->status_name;
        $redeliveries->package_code = $request->package_code;
        $redeliveries->storage_period = $request->storage_period;
        $redeliveries->note = $request->note;
        $redeliveries->updated_at = $request->updated_at;
        $redeliveries->save();
        return $redeliveries;//redirect()->action('RedeliveriesController@index');
    }

    public function editQRRedeliveries(String $redeliveriesId ) {
        $redeliveries = Redeliveries::
            where('uuid', '=', $redeliveriesId)
            ->where(
                function($query) {
                    return $query
                        ->whereNull('deleted_at')
                        ->orWhere('deleted_at', '=', '');
                   }
            )
            ->get();
        return view('editredeliveries')->with(compact('redeliveries'));
        //return $redeliveries;
    }

    public function updateQRRedeliveries(Request $request ) {
        // return $request;
        $redeliveries = Redeliveries::find($request->id);
        if($request->redelivery_date !=null){
            $redeliveries->redelivery_date = $request->redelivery_date;
        }
        if($request->redelivery_time_id !=null){
            $redeliveries->redelivery_time_id = $request->redelivery_time_id;
            $redeliveries->redelivery_time_name = $request->redelivery_time_name;
        }
        $redeliveries->status_id = $request->status_id;         
        $redeliveries->status_name = $request->status_name;         
        $redeliveries->updated_at = $request->updated_at;
        $redeliveries->save();
        return $redeliveries;//redirect()->action('RedeliveriesController@index');
    }
}
