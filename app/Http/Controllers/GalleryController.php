<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('gallery.index')
            ->with('galleries', Gallery::orderBy('created_at', 'desc')->get());
    }

    public function show(Gallery $gallery)
    {
        return view('gallery.show')
            ->with('gallery', $gallery);
    }
}
