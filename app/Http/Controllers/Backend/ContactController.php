<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\contactinfo;
use App\Models\Backend\contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = contactinfo::orderBy('id','asc')->get();
        return view('backend.pages.info.manage',compact('info'));
    }

    // Check All Mails
    public function mail(){
        $items = contact::orderBy('id','desc')->paginate(15);
        return view('backend.pages.mail.manage',compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = contactinfo::find($id);
        if( !is_null($info) ){
            return view('backend.pages.info.edit',compact('info'));
        }
        else{
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $info =  contactinfo::find($id);

        $info->email        = $request->email;
        $info->phone        = $request->phone;
        $info->address      = $request->address;
        $info->description  = $request->description;
        $info->facebook     = $request->facebook;
        $info->twitter      = $request->twitter;
        $info->map_api      = $request->map_api;
        $info->linkedin     = $request->linkedin;
        $info->schedule1    = $request->schedule1;
        $info->schedule2    = $request->schedule2;
        $info->schedule3    = $request->schedule3;

        $info->save();
        $notification = array(
            'message' => 'Contact Information Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('contact.manage')->with($notification);
    }

}
