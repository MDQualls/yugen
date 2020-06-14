<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\CreateGalleryRequest;
use App\Http\Requests\Gallery\UpdateGalleryRequest;
use Illuminate\Http\Request;

class GalleryAdminController extends Controller
{
    public function index()
    {
        return view('admin.gallery.index');
    }


    public function create()
    {
        return view('admin.gallery.create');
    }


    public function store(CreateGalleryRequest $request)
    {

    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.create');
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {

    }

    public function destroy(Gallery $gallery)
    {

    }
}
