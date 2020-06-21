<?php

namespace App\Http\Controllers\Admin;

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
     * @param Gallery $gallery
     * @return Application|Factory|View
     */
    public function edit(Gallery $gallery)
    {
        $images = $gallery->images;

        return view('admin.galleryimage.index')
            ->with('gallery', $gallery)
            ->with('images', $images);
    }

    /**
     * @param Gallery $gallery
     * @return Application|Factory|View
     */
    public function create(Gallery $gallery)
    {
        return view('admin.galleryimage.create')
            ->with('gallery', $gallery);
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

        $cover_image = isset($request->cover_image) ? 1 : 0;

        $galleryImage = GalleryImage::create([
            'image' => $img,
            'cover_image' => $cover_image,
            'gallery_id' => $request->gallery_id,
            'alt_text' => $request->alt_text,
        ]);

        session()->flash('success', 'Image successfully added to gallery');

        return redirect(route('galleryimage.edit', $request->gallery_id));
    }
}
