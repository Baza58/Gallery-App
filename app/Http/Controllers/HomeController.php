<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Picture;
use App\User;
use Auth;
use Image;
use Illuminate\Http\Request;



class HomeController extends Controller
{

    public function index($userName)
    {
        $gallery_owner = User::whereName($userName)->firstOrFail();
    	
        if (!Auth::check()) {        
            return redirect('/uzivatel/' . $gallery_owner ->id);
        }

        if (Auth::user()->name != $gallery_owner ->name) {
            return redirect('/uzivatel/' . $gallery_owner ->id);
        }

        return view('home')->with('author', Auth::user()->name);        	
    }

    public function getNewGallery()
    {
    	return view('new_gallery');
    }

    public function postNewGallery(Request $request)
    {
    	Auth::user()->galleries()->create([
    		'title' => $request->input('title'),
    		'description' => $request->input('description')
    	]);
        
        $galleries =  Auth::user()->galleries()->with('pictures')->get();

        return response()->json([
            'data' => $galleries->toArray()
        ], 200);	
    }

    public function getGallery($userName, $id)
    {
    	$gallery = Gallery::find($id);
        
    	if (!Auth::user() || Auth::user()->id !== $gallery->user_id) {
            $url = "/uzivatel/gallery/$id";
            return redirect($url);
        }

    	return view('gallery')
            ->with('gallery_title', $gallery->title)
            ->with('author', $gallery->user->name)
            ->with('description', $gallery->description);

    }
    public function getAddPhotos($id) 
    {
    	$gallery = Auth::user()->galleries()->where('id', $id)->first();
    	return view('add-photos')->with('gallery', $gallery);
    }

    public function postAddPhotos($id, Request $request)
    {
        $files = $request->files;

        foreach($files as $file) {
        $path = '' . base_path() . '/pics/' . $id;
        $name = $file->getClientOriginalName();
        $filename = $file->move($path, $name);
        $picture = Gallery::find($id)->pictures()->create([
            
            'url' => $file->getClientOriginalName()
        ]);
        }

    	$gallery = Gallery::find($id);
    	$pics = $gallery->pictures;

        return response()->json([
            'data' => $pics->toArray(),
            
        ]);
    	 return response()->json(['status' => 'done']);
    	
    }

    public function deletePicture($id) 
    {    	

    	$user = Auth::user();

    	$picture = Picture::whereIn('gallery_id', function($query) use ($user) {
    		$query->select('id')->from('galleries')->where('user_id', $user->id);
    	})->where('id', $id)->first();

    	if (!$picture) {
    		return response()->json(['status' => 'error']);
    	}

    	$picture->delete();

    	return response()->json(['status' => 'ok']);
    }


    public function getPicture($id)
    {
    	$picture = Picture::find($id);
    	return view('single_picture')
            ->with('picture', $picture)
            ->with('gallery', $picture->gallery);
    }
}
