<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('gallery.index')
            ->with('galleries', Gallery::all());
    }

    public function show(Gallery $gallery)
    {
        return view('gallery.show')
            ->with('gallery', $gallery);
    }
}
