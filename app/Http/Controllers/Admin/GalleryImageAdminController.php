<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\GalleryImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\gallery\CreateGalleryImageRequest;
use App\Http\Requests\gallery\UpdateGalleryImageRequest;
use App\Http\Requests\Gallery\UpdateGalleryRequest;
use App\Services\Image\ImageStorageInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
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
    public function index(Gallery $gallery)
    {
        $images = $gallery->images;

        return view('admin.galleryimage.index')
            ->with('gallery', $gallery)
            ->with('images', $images);
    }

    /**
     * @param GalleryImage $galleryimage
     * @return Application|Factory|View
     */
    public function edit(GalleryImage $galleryimage)
    {
        return view('admin.galleryimage.create')
            ->with('gallery', $galleryimage->gallery)
            ->with('galleryimage', $galleryimage);
    }

    /**
     * @param UpdateGalleryImageRequest $request
     * @param Gallery $galleryimage
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateGalleryImageRequest $request, GalleryImage $galleryimage)
    {
        $gallery_id = $galleryimage->gallery_id;

        $data = $request->only('alt_text');

        $galleryimage->update($data);

        session()->flash('success', 'Image updated successfully.');

        return redirect(route('galleryimage.index', $gallery_id));
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


        $galleryImage = GalleryImage::create([
            'image' => $img,
            'gallery_id' => $request->gallery_id,
            'alt_text' => $request->alt_text,
        ]);

        session()->flash('success', 'Image successfully added to gallery');

        return redirect(route('galleryimage.index', $request->gallery_id));
    }

    public function destroy(GalleryImage $galleryimage)
    {
        $galleryId = $galleryimage->gallery_id;

        $this->imageStorageService->delete($galleryimage->image);
        $galleryimage->delete();

        session()->flash('success', 'Image successfully deleted from gallery');

        return redirect(route('galleryimage.index', $galleryId));
    }
}
