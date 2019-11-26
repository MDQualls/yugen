<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.post.index')->with('posts', Post::simplePaginate(10));
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
        Post::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'post_content' => $request->post_content,
            'published_at' => $request->published_at,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('success', 'Post successfully created.');

        return redirect(route('post.index'));
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

        $post->update($data);

        session()->flash('success', 'Post updated successfully.');

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
