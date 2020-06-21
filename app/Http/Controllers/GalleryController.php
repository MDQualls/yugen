<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('gallery.index')
            ->with('agent', $this->agent)
            ->with('galleries', Gallery::all());
    }

    public function show(Gallery $gallery)
    {
        return view('gallery.show')
            ->with('agent', $this->agent)
            ->with('gallery', $gallery);
    }
}
