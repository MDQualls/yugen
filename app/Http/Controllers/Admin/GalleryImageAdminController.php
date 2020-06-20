<?php

namespace App\Http\Controllers\admin;

use App\Gallery;
use App\GalleryImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\gallery\CreateGalleryImageRequest;
use App\Services\Image\ImageStorageInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class GalleryImageAdminController extends Controller
{
    /**
     * @var ImageStorageInterface
     */
    protected $imageStorageService;

    public function __construct(ImageStorageInterface $imageStorageService)
    {
        parent::__construct();
        $this->imageStorageService = $imageStorageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
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
        $img = $this->imageStorageService->store(
            $request->image->getClientOriginalName(),
            $request->image);

        $galleryImage = GalleryImage::create([
            'image' => $img,
            'cover_image' => $request->cover_image,
            'gallery_id' => $request->gallery_id,
            'alt_text' => $request->alt_text,
        ]);

        session()->flash('success', 'Image successfully added to gallery');

        return redirect(route('galleryimageadmin.edit', $request->gallery_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $x = $id;
    }
}
