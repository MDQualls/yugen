<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\CreateGalleryRequest;
use App\Http\Requests\Gallery\UpdateGalleryRequest;
use App\Services\Gallery\GalleryImageServiceInterface;
use App\Services\Image\ImageStorageInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GalleryAdminController extends Controller
{
    /**
     * @var GalleryImageServiceInterface
     */
    protected $galleryService;

    /**
     * @var ImageStorageInterface
     */
    protected $imageStorageService;

    public function __construct(GalleryImageServiceInterface $galleryService, ImageStorageInterface $imageStorageService)
    {
        parent::__construct();
        $this->galleryService = $galleryService;
        $this->imageStorageService = $imageStorageService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $galleries = Gallery::paginate(10);

        return view('admin.gallery.index')
                ->with('galleries', $galleries);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * @param CreateGalleryRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateGalleryRequest $request)
    {
        $id = Auth::user()->id;

        $img = $this->imageStorageService->store(
            $request->cover_image->getClientOriginalName(),
            $request->cover_image);

        Gallery::create([
            'name' => $request->name,
            'summary' => $request->summary,
            'user_id' => $id,
            'cover_image' => $img,
        ]);

        session()->flash('success', 'Gallery successfully created');

        return redirect(route('galleryadmin.index'));
    }

    public function edit(Gallery $galleryadmin)
    {
        return view('admin.gallery.create')
                ->with('gallery', $galleryadmin);
    }

    /**
     * @param UpdateGalleryRequest $request
     * @param Gallery $galleryadmin
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateGalleryRequest $request, Gallery $galleryadmin)
    {
        $data = $request->only('id', 'name', 'summary');

        $this->imageStorageService->delete($galleryadmin->cover_image);

        $img = $this->imageStorageService->store(
            $request->cover_image->getClientOriginalName(),
            $request->cover_image);

        $data['cover_image'] = $img;

        $galleryadmin->update($data);

        session()->flash('success', 'Gallery updated successfully.');

        return redirect(route('galleryadmin.index'));
    }

    public function destroy(Gallery $galleryadmin)
    {
        foreach ($galleryadmin->images as $image)  {
            $this->imageStorageService->delete($image->image);
            $image->delete();
        }

        $galleryadmin->delete();
        session()->flash('success', 'Gallery deleted successfully');

        return redirect(route('galleryadmin.index'));
    }
}
