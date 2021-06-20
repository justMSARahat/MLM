<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Backend\payment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use File;
use Image;
use Auth;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ( Auth::guard('customer')->check() ) {

            return view('frontend.pages.account');
        }
        else{
            return redirect()->route('login.form');
        }
    }

    public function profile(Request $request, $id)
    {

        $id         = Auth::guard('customer')->user()->id;
        $customer   = customer::find($id);

        $customer->name      = $request->name;
        $customer->email     = $request->email;
        $customer->phone     = $request->phone;
        $customer->address   = $request->address;

        if($request->image){

            if( file::exists('Backend/Image/User/' .$customer->image) ){
                file::delete('Backend/Image/User/' .$customer->image);
            }

            $image = $request->file('image');
            $img   = rand().'_'.'Customer_Profile_Image'.'_'.'Updated'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/User/'.$img);
            Image::make($image)->save($loc);
            $customer->image   = $img;
        }

        $customer->save();

        $notification = array(
            'message' => 'User Information Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function active(Request $request, $id)
    {

        $id         = Auth::guard('customer')->user()->id;
        $customer   = customer::find($id);

        $customer->payment  = $request->payment;
        $customer->invoice  = $request->invoice;

        $customer->save();

        $notification = array(
            'message' => 'Payment Pening',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function payment_request(Request $request){
        $payment = new payment();

        $payment->user_id              = Auth::guard('customer')->user()->id;
        $payment->name                 = Auth::guard('customer')->user()->name;
        $payment->email                = Auth::guard('customer')->user()->email;
        $payment->phone                = Auth::guard('customer')->user()->phone;
        $payment->payment_number       = $request->payment_number;
        $payment->payment_invoice      = Str::random(20);
        $payment->payment_amount       = Auth::guard('customer')->user()->amount;
        $payment->payment_method       = $request->payment_method;
        $payment->status               = 2;

        $payment->save();

        $user   = Auth::guard('customer')->user()->id;
        foreach( Customer::where('id',$user)->get() as $cus ){
            $cus->amount = 0;
            $cus->save();
        }

        $notification = array(
            'message' => 'Payment Requested',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }
    public function __construct()
    {
      $this->middleware('auth:customer'); //If user is not logged in then he can't access this page
    }


    public function password(Request $request)
    {

         $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);



       $hashedPassword = Auth::guard('customer')->user()->password;

       if (\Hash::check($request->oldpassword , $hashedPassword )) {

         if (!\Hash::check($request->newpassword , $hashedPassword)) {

              $users =Customer::find(Auth::guard('customer')->user()->id);
              $users->password = bcrypt($request->newpassword);
              Customer::where( 'id' , Auth::guard('customer')->user()->id)->update( array( 'password' =>  $users->password));

              session()->flash('message','password updated successfully');
              return redirect()->back();
            }

            else{
                  session()->flash('message','new password can not be the old password!');
                  return redirect()->back();
                }
           }

          else{
               session()->flash('message','old password doesnt matched ');
               return redirect()->back();
             }

       }

}
