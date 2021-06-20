<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\video;

class VideoController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items   = video::orderBy('id','desc')->paginate(15);
        return view('backend.pages.video.manage',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.video.create',);
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
                'video' => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'video.required'        => 'Please Video Link ',
            ],

        );

        $video =  new video();

        $video->title          = $request->title;
        $video->video          = $request->video;
        $video->point          = $request->point;

        $video->save();

        $notification = array(
            'message' => 'Video Added',
            'alert-type' => 'success'
        );

        return redirect()->route('video.manage')->with($notification);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = video::find($id);
        if( !is_null($video) ){
            return view('backend.pages.video.edit',compact('video'));
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
                'video' => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'video.required'        => 'Please Video Link ',
            ],
        );

        $video =  video::find($id);

        $video->title          = $request->title;
        $video->video          = $request->video;
        $video->point          = $request->point;

        $video->save();

        $notification = array(
            'message' => 'Video Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('video.manage')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = video::find($id);
        if( !is_null($video) ){
            $video->delete();

            $notification = array(
                'message' => 'Question Deleted',
                'alert-type' => 'danger'
            );

            return redirect()->route('video.manage')->with($notification);
        }
        else{
            return back();
        }
    }

}
