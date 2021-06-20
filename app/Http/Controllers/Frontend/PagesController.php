<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Backend\contactinfo;
use App\Models\Customer;
use App\Models\Backend\contact;
use App\Models\Backend\faq;
use App\Models\Backend\video;
use App\Models\Backend\about;
use App\Models\Backend\view;
use Auth;
use Mail;

class PagesController extends Controller
{
    //Show Home Page
    public function home(){
        return view('frontend.pages.index');
    }
    //Show Record Page
    public function record(){
        return view('frontend.pages.record');
    }
    //Show Contact Page
    public function about(){
        $about = about::orderBy('id','asc')->first();
        return view('frontend.pages.about',compact('about'));
    }
    //Show Faq Page
    public function faq(){
        $items = faq::orderBy('id','desc')->get();
        return view('frontend.pages.faq',compact('items'));
    }
    //Show Faq Page
    public function video(){
        $date  = \Carbon\Carbon::today()->subDays(1);
        $items = video::orderBy('id','desc')->where('created_at', '>=', $date)->get();
        $count = $items->count();
        return view('frontend.pages.video',compact('items','count'));
    }
    //Show Faq Page
    public function show($id){
        $video = video::find($id);
        if( !is_null($video) ){
            return view('frontend.pages.video_show',compact('video'));
        }
        else{
            return back();
        }
    }
    //Show Faq Page
    public function submit(Request $request){
        $view   = new view();

        $uid    = $request->user_id;
        $v_id   = $request->video_id;
        $status = $request->status;

        $v_info = video::where('id',$v_id)->first();

        $exist  = view::where('user_id',$uid)->where('video_id',$v_id)->first();

        if( is_null( $exist ) ){

            $view->user_id    = $request->user_id;
            $view->video_id   =  $request->video_id;
            $view->status     = $request->status;

            $view->save();

            foreach( Customer::where('id',$uid )->get() as $cus ){
                $cus->amount =  $cus->amount + $v_info->point;
                $cus->save();
            }

        }
    }
    //Show Contact Page
    public function contact(){
        $contact    = contactinfo::orderBy('id','asc')->first();
        return view('frontend.pages.contact',compact('contact'));
    }
    //Send Email
    public function saveContact(Request $request){
        $this->validate($request, [
            'name'         => 'required',
            'email'        => 'required|email',
            'subject'      => 'required',
            'phone_number' => 'required',
            'message'      => 'required'
        ]);

        $contact = new Contact;

        $contact->name         = $request->name;
        $contact->email        = $request->email;
        $contact->subject      = $request->subject;
        $contact->phone_number = $request->phone_number;
        $contact->message      = $request->message;


        $input = $request->all();

        Contact::create($input);

        //  Send mail to admin
        \Mail::send('contactMail', array(
            'name'    => $input['name'],
            'email'   => $input['email'],
            'phone'   => $input['phone_number'],
            'subject' => $input['subject'],
            'content' => $input['message'],
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('justshamsulalom@gmail.com', 'Admin')->subject($request->get('subject'));
        });

        $notification = array(
            'message' => 'Mail Send',
            'alert-type' => 'success'
        );

          return back()->with($notification);

    }

}
