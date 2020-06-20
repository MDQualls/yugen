<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\CreateGalleryRequest;
use App\Http\Requests\Gallery\UpdateGalleryRequest;
use App\Services\Gallery\GalleryImageServiceInterface;
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

    public function __construct(GalleryImageServiceInterface $galleryService)
    {
        parent::__construct();
        $this->galleryService = $galleryService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.gallery.index')
                ->with('galleries', Gallery::paginate(10));
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

        Gallery::create([
            'name' => $request->name,
            'summary' => $request->summary,
            'user_id' => $id,
        ]);

        session()->flash('success', 'Gallery successfully created');

        return redirect(route('galleryadmin.index'));
    }

    public function edit(Gallery $galleryadmin)
    {
        return view('admin.gallery.create')
                ->with('gallery', $galleryadmin);
    }

    public function update(UpdateGalleryRequest $request, Gallery $galleryadmin)
    {
        $data = $request->only('id', 'name', 'summary');

        $galleryadmin->update($data);

        session()->flash('success', 'Gallery updated successfully.');

        return redirect(route('galleryadmin.index'));
    }

    public function destroy(Gallery $galleryadmin)
    {
        $galleryadmin->delete();
        session()->flash('success', 'Gallery deleted successfully');

        return redirect(route('galleryadmin.index'));
    }
}
