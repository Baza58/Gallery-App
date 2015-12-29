<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $galleries =  Auth::user()->galleries()->with('pictures')->get();

        return response()->json([
            'data' => $galleries->toArray(),
            'user' => Auth::user()->name
        ], 200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $gallery = Auth::user()->galleries()->create($request);

        return response()->json([
            'data' => $gallery->toArray()
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {    
        $gallery = Gallery::find($id);
    
        $pictures = $gallery->pictures;

        // if (!Auth::user() || Auth::user()->id !== $gallery->user_id) {
        //     $url = "/uzivatel/gallery/$id";
        //     return redirect($url);
        // }

        return response()->json([
            'data' => $pictures->toArray(),
            'gallery_title' => $gallery->title,
            'user' => $gallery->user->name,
            'description' => $gallery->description
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        $user = Auth::user();
        $pic = Picture::find($id);
        $gallery = $pic->gallery()->first();
        
        $picture = Picture::whereIn('gallery_id', function($query) use ($user) {
            $query->select('id')->from('galleries')->where('user_id', $user->id);
        })->where('id', $id)->first();

        if (!$picture) {
            return response()->json(['status' => 'error'], 422);
        }

        $picture->delete();
        $pics = $gallery->pictures;

        return response()->json([
            'data' => $pics->toArray(),
            
        ]); 
        
    }
    public function singlePicture($id)
    {
        $user = Auth::user();
        $picture = Picture::whereIn('gallery_id', function($query) use ($user) {
            $query->select('id')->from('galleries')->where('user_id', $user->id);
        })->where('id', $id)->first();

        return response()->json([
                'data' => $picture->toArray()
            ]);    
    }

    public function deleteGallery($id) {
        $user = Auth::user();

        $gallery = Gallery::whereIn('user_id', function($query) use ($user) {
            $query->select('id')->from('users')->where('id', $user->id);
        })->where('id', $id)->first();
        
        if (!$gallery) {
            return response()->json(['status' => 'error']);
        }
        $gallery->delete();

        $galleries =  Auth::user()->galleries()->with('pictures')->get();

        return response()->json([
            'data' => $galleries->toArray()
        ], 200);
    }
}
