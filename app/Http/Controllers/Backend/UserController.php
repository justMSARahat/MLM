<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Backend\webinfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;
use File;
 
class UserController extends Controller
{

    public function user_index(Request $request){
        $users     = Customer::orderBy('id','desc')->paginate(15);
        return view('backend.pages.customer.manage',compact('users'));
    }
    public function pending(Request $request){
        $users     = Customer::orderBy('id','desc')->whereNotNull('payment')->whereNotNull('invoice')->where('status',2)->paginate(15);
        return view('backend.pages.customer.pending',compact('users'));
    }
    public function due(Request $request){
        $users     = Customer::orderBy('id','desc')->whereNull('payment')->whereNull('invoice')->where('status',2)->paginate(15);
        return view('backend.pages.customer.pending',compact('users'));
    }

    public function user_create(Request $request){

        return view('backend.pages.customer.create');

    }

    public function user_store(Request $request){

        $customer =  new Customer();

        $customer->name        = $request->name;
        $customer->email       = $request->email;
        $customer->password    = Hash::make($request->password);
        $customer->phone       = $request->phone;
        $customer->address     = $request->address;
        $customer->reffer      = $request->reffer;
        $customer->ref_id      = Str::random(20);
        $customer->status      = $request->status;

        if($request->image){
            $image = $request->file('image');
            $img   = rand().'_'.'User-Image'.'_'.$request->title.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/User/'.$img);
            Image::make($image)->save($loc);
            $customer->image   = $img;
        }


        $customer->save();

        $notification = array(
            'message' => 'User Created',
            'alert-type' => 'success'
        );
        return redirect()->route('user.manage')->with($notification);
    }
    public function user_edit(Request $request, $id){
        $user   = Customer::find($id);
        if( !is_null($user) ){
            return view('backend.pages.customer.edit',compact('user'));
        }
        else{
            return redirect()->back();
        }
    }

    public function user_update(Request $request, $id){

        $customer =  Customer::find($id);


        $customer->name        = $request->name;
        $customer->email       = $request->email;
        $customer->password    = Hash::make($request->password);
        $customer->phone       = $request->phone;
        $customer->address     = $request->address;
        $customer->reffer      = $request->reffer;
        $customer->status      = $request->status;

        if($request->image){

            if( file::exists('Backend/Image/User/'. $customer->image) ){
                file::delete('Backend/Image/User/'. $customer->image);
            }

            $image = $request->file('image');
            $img   = rand().'_'.'User-Image'.'_'.$request->title.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/User/'.$img);
            Image::make($image)->save($loc);
            $customer->image   = $img;
        }

        $customer->save();

        $notification = array(
            'message' => 'User Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('user.manage')->with($notification);
    }

    public function user_destroy(Request $request, $id){
        $customer =  Customer::find($id);

        $customer->status      = 2;

        $customer->save();

        $notification = array(
            'message' => 'User Removed',
            'alert-type' => 'danger'
        );
        return redirect()->route('user.manage')->with($notification);
    }
    public function approve(Request $request, $id){
        $customer =  Customer::find($id);
        $webinfo  = webinfo::orderBy('id','desc')->first();

        $customer->status      = 1;
        if( is_null( $customer->activity ) ){
            $customer->amount       = $customer->amount + $webinfo->join_bonus;
            $customer->activity     = 1;
        }

        $customer->save();

        $reffer   = $customer->reffer;
        $ref_id   = Customer::where('ref_id',$reffer)->first();
        //Referance Bonus Adding to Parent ID
        if( $customer->activity==1 ){
            foreach( Customer::where('ref_id',$reffer)->get() as $cus ){
                $cus->amount = $cus->amount + $webinfo->reffer_bonus;
                $cus->save();
            }
        }

        $notification = array(
            'message' => 'User Approved',
            'alert-type' => 'info'
        );
        return redirect()->route('user.manage')->with($notification);
    }



    public function admin_index(Request $request){
        $users     = User::orderBy('name','asc')->paginate(15);
        return view('backend.pages.admin.manage',compact('users'));
    }

    public function admin_create(Request $request){

        $countrys = country::orderBy('priority','asc')->get();
        $states   = state::orderBy('id','asc')->get();
        $citys    = city::orderBy('state','asc')->get();
        return view('backend.pages.admin.create',compact('countrys','citys','states'));

    }

    public function admin_store(Request $request){

        $customer =  new User();

        $customer->name        = $request->name;
        $customer->last_name   = $request->last_name;
        $customer->email       = $request->email;
        $customer->password    = Hash::make($request->password);
        $customer->phone       = $request->phone;
        $customer->image       = $request->image;
        $customer->address_one = $request->address_one;
        $customer->address_two = $request->address_two;
        $customer->post_code   = $request->post_code;
        $customer->city        = $request->city;
        $customer->country     = $request->country;
        $customer->state       = $request->state;
        $customer->status      = $request->status;

        if($request->image){
            $image = $request->file('image');
            $img   = rand().'_'.'User-Image'.'_'.$request->title.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/User/'.$img);
            Image::make($image)->save($loc);
            $customer->image   = $img;
        }


        $customer->save();

        $notification = array(
            'message' => 'User Created',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.manage')->with($notification);
    }

    public function admin_edit(Request $request, $id){
        $user   = User::find($id);
        if( !is_null($user) ){
            $countrys = country::orderBy('priority','asc')->get();
            $states   = state::orderBy('id','asc')->get();
            $citys    = city::orderBy('state','asc')->get();
            return view('backend.pages.admin.edit',compact('countrys','citys','states','user'));
        }
        else{
            return redirect()->back();
        }
    }

    public function admin_update(Request $request, $id){

        $customer =  User::find($id);

        $customer->name        = $request->name;
        $customer->last_name   = $request->last_name;
        $customer->email       = $request->email;
        $customer->password    = Hash::make($request->password);
        $customer->phone       = $request->phone;
        $customer->image       = $request->image;
        $customer->address_one = $request->address_one;
        $customer->address_two = $request->address_two;
        $customer->post_code   = $request->post_code;
        $customer->city        = $request->city;
        $customer->country     = $request->country;
        $customer->state       = $request->state;
        $customer->status      = $request->status;


        if($request->image){

            if( file::exists('Backend/Image/User/'. $customer->image) ){
                file::delete('Backend/Image/User/'. $customer->image);
            }

            $image = $request->file('image');
            $img   = rand().'_'.'User-Image'.'_'.$request->title.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/User/'.$img);
            Image::make($image)->save($loc);
            $customer->image   = $img;
        }

        $customer->save();

        $notification = array(
            'message' => 'User Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.manage')->with($notification);
    }

    public function admin_destroy(Request $request, $id){
        $customer =  User::find($id);

        $customer->status      = 2;

        $customer->save();

        $notification = array(
            'message' => 'User Removed',
            'alert-type' => 'danger'
        );
        return redirect()->route('admin.manage')->with($notification);
    }

        /**
        * @return \Illuminate\Support\Collection
        */
        public function fileImportExport()
        {
            return view('backend.pages.import');
        }

        /**
        * @return \Illuminate\Support\Collection
        */
        public function fileImport(Request $request)
        {
            Excel::import(new CustomerImport, $request->file('file')->store('temp'));

            $notification = array(
                'message' => 'Import Done',
                'alert-type' => 'success'
            );
            return redirect()->route('user.manage')->with($notification);
        }

        /**
        * @return \Illuminate\Support\Collection
        */
        public function fileExport()
        {
            Excel::download(new CustomerExport, 'users-collection.xlsx');

            $notification = array(
                'message' => 'Data Downloading...',
                'alert-type' => 'success'
            );
            return redirect()->route('user.manage')->with($notification);
        }
}
