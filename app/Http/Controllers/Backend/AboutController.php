<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\about;

class AboutController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = about::orderBy('id','asc')->first();
        return view('backend.pages.about.manage',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = about::find($id);
        if( !is_null($about) ){
            return view('backend.pages.about.edit',compact('about'));
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

        $about =  about::find($id);

        $about->title        = $request->title;
        $about->description  = $request->description;

        $about->save();
        $notification = array(
            'message' => 'About Information Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('about.manage')->with($notification);
    }

}
