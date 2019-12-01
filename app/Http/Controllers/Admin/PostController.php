<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Services\Tag\TagServiceInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * @var TagServiceInterface
     */
    var $tagService;

    public function __construct(TagServiceInterface $tagService)
    {
        $this->middleware('verifyCategoryCount')->only(['create', 'store']);

        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.post.index')
            ->with('title', 'Active Posts')
            ->with('posts', Post::where('archived', '=', 0)->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.post.create')->with('categories', Category::all());
    }

    /**
     * @param CreatePostRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreatePostRequest $request)
    {
        $img = '';
        if($request->hasFile('header_image'))  {
            $img = $request->header_image->store('posts');
        }


        $post = Post::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'post_content' => $request->post_content,
            'published_at' => $request->published_at,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'header_image' => $img,
        ]);

        if ($request->tags) {
             $this->tagService->updateTags($post, $request->tags);
        }

        session()->flash('success', 'Post successfully created.');

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function edit(Post $post)
    {
        return view('admin.post.create')
            ->with('post', $post)
            ->with('categories', Category::all());
    }

    /**
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return RedirectResponse|Redirector
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only('title', 'summary', 'post_content', 'published_at', 'category');

        if($request->hasFile('header_image'))  {
            $img = $request->header_image->store('posts');
            Storage::delete($post->header_image);
            $data['header_image'] = $img;
        }

        $post->update($data);

        $this->tagService->updateTags($post, $request->tags);

        session()->flash('success', 'Post updated successfully.');

        return redirect(route('post.index'));
    }

    /**
     * @param Post $post
     * @return RedirectResponse|Redirector
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->header_image);
        $post->delete();
        session()->flash('success', 'Post deleted successfully');

        return redirect(route('archived-posts'));
    }

    /**
     * @param Post $post
     * @return RedirectResponse|Redirector
     */
    public function archive(Post $post)
    {
        $post->archived = 1;
        $post->save();

        session()->flash('success', 'Post successfully archived.');

        return redirect(route('post.index'));
    }

    /**
     * @return Factory|View
     */
    public function archivedPosts()
    {
        return view('admin.post.index')
            ->with('title', 'Archived Posts')
            ->with('posts', Post::where('archived', '=', 1)->paginate(10));
    }

    /**
     * @param Post $post
     * @return RedirectResponse|Redirector
     */
    public function restore(Post $post)
    {
        $post->archived = 0;
        $post->save();

        session()->flash('success', 'Post successfully restored.');

        return redirect(route('post.index'));
    }
}