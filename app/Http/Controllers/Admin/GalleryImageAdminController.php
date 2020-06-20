<?php

namespace App\Http\Controllers\admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\gallery\CreateGalleryImageRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class GalleryImageAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param CreateGalleryImageRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateGalleryImageRequest $request)
    {
        session()->flash('success', 'Image successfully added to gallery');

        return redirect(route('galleryimageadmin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Gallery $galleryimageadmin
     * @return Application|Factory|View
     */
    public function edit(Gallery $galleryimageadmin)
    {
        $images = $galleryimageadmin->images();

        return view('admin.galleryimage.index')
            ->with('gallery', $galleryimageadmin)
            ->with('images', $images);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $x = $id;
    }
}
