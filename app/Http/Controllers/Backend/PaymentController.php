<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\webinfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Backend\payment;
use Image;
use File;

class PaymentController extends Controller
{
    public function index(Request $request){
        $items     = payment::orderBy('id','desc')->paginate(15);
        return view('backend.pages.payment.manage',compact('items'));
    }
    public function pending(Request $request){
        $items     = payment::orderBy('id','desc')->where('status',2)->paginate(15);
        return view('backend.pages.payment.pending',compact('items'));
    }
    public function cancel(Request $request){
        $items     = payment::orderBy('id','desc')->where('status',3)->paginate(15);
        return view('backend.pages.payment.declined',compact('items'));
    }

    public function approve(Request $request, $id){

        $payment =  payment::find($id);

        $payment->transection_code        = $request->transection_code;
        $payment->status      = 1;

        $payment->save();

        $notification = array(
            'message' => 'Payment Done',
            'alert-type' => 'success'
        );
        return redirect()->route('payment.manage')->with($notification);
    }
    public function update(Request $request, $id){

        $payment =  payment::find($id);

        $payment->payment_number    = $request->payment_number;
        $payment->transection_code  = $request->transection_code;
        $payment->payment_method    = $request->payment_method;
        $payment->status            = $request->status;

        $payment->save();

        $notification = array(
            'message' => 'Payment Information Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('payment.manage')->with($notification);
    }

    public function destroy(Request $request, $id){
        $payment =  payment::find($id);

        $payment->status      = 3;

        $payment->save();

        $notification = array(
            'message' => 'Payment Declined',
            'alert-type' => 'danger'
        );
        return redirect()->route('payment.manage')->with($notification);
    }
}
