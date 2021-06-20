<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Backend\video;
use App\Models\Backend\payment;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customer = Customer::orderBy('id','asc')->count();
        $video    = video::orderBy('id','asc')->count();
        $payment  = payment::orderBy('id','asc')->count();

        $transection  = payment::orderBy('id','desc')->where('status',2)->limit(4)->get();

        $OrderChart = payment::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
        $OrderMonth  = payment::select(DB::raw("Month(created_at) as month"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('month');
        $datas      = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
        foreach( $OrderMonth as $index => $month ){
            $datas[$month]  = $OrderChart[$index];
        }


        $userChart = Customer::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
        $userMonth  = Customer::select(DB::raw("Month(created_at) as month"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('month');
        $users      = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
        foreach( $userMonth as $index => $month ){
            $users[$month]  = $userChart[$index];
        }

        return view('backend.dashboard',compact('customer','video','payment','transection','datas','users'));
    }

}
