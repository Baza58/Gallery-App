<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index()
    {
    	return view('frontpage');
    }

    public function getUsers()
    {
    	return view('allUsers');
    }

    public function getUser($id)
    {
        $user = User::findOrFail($id);
    	return view('userHome')->with('author', $user->name);
    }

    public function getUserById($id) 
    {
    	$user = User::find($id);
    	$galleries =  User::find($id)->galleries()->with('pictures')->get();

        return response()->json([
            'data' => $galleries->toArray(),
            'user' => $user->name
        ], 200);
    }

    public function getUserGallery($id, $galleryId)
    {
        $gallery = Gallery::findOrFail($galleryId);
    	return view('galleryPublic')
            ->with('author', $gallery->user->name)
            ->with('description', $gallery->description)
            ->with('gallery_title', $gallery->title);
    }

    public function getGallery($gallery_id)
    {
    	$gallery = Gallery::findOrFail($gallery_id);
        $pictures = $gallery->pictures;

        return response()->json([
            'data' => $pictures->toArray(),
            'gallery_title' => $gallery->title,
            'description' => $gallery->description
        ]);
    }

    public function getAllUsers() {
        $users = User::all();

        //remove password etc

        return response()->json([
            'data' => $users
        ]);
    }
}
