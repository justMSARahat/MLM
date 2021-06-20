<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items   = faq::orderBy('id','desc')->get();
        return view('backend.pages.faq.manage',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.faq.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title'       => 'required',
                'description' => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'description.required'  => 'Please Insert Description ',
            ],

        );

        $faq =  new faq();

        $faq->title          = $request->title;
        $faq->description    = $request->description;

        $faq->save();

        $notification = array(
            'message' => 'Question Added',
            'alert-type' => 'success'
        );

        return redirect()->route('faq.manage')->with($notification);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = faq::find($id);
        if( !is_null($faq) ){
            return view('backend.pages.faq.edit',compact('faq'));
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
        $request->validate(
            [
                'title'       => 'required',
                'description' => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'description.required'  => 'Please Insert Description ',
            ],

        );

        $faq =  faq::find($id);

        $faq->title          = $request->title;
        $faq->description    = $request->description;

        $faq->save();

        $notification = array(
            'message' => 'Question Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('faq.manage')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = faq::find($id);
        if( !is_null($faq) ){
            $faq->delete();

            $notification = array(
                'message' => 'Question Deleted',
                'alert-type' => 'danger'
            );

            return redirect()->route('faq.manage')->with($notification);
        }
        else{
            return back();
        }
    }

}
