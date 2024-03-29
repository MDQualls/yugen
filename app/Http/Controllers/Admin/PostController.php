<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Jobs\ProcessContentAlerts;
use App\Post;
use App\Services\Log\LogServiceInterface;
use App\Services\Notification\ContentAlertInterface;
use App\Services\Image\ImageStorageInterface;
use App\Services\Post\SummerNoteImageInterface;
use App\Services\Tag\TagServiceInterface;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use function Couchbase\passthruEncoder;

class PostController extends Controller
{
    /**
     * @var TagServiceInterface
     */
    protected $tagService;

    /**
     * @var SummerNoteImageInterface
     */
    protected $summerNoteImageService;

    /**
     * @var ImageStorageInterface
     */
    protected $headerImageService;

    /**
     * @var ContentAlertInterface
     */
    protected $contentAlertService;

    /**
     * @var ProcessContentAlerts
     */
    protected $processContentAlerts;

    /**
     * @var LogServiceInterface
     */
    protected $logService;


    public function __construct(
        TagServiceInterface $tagService,
        SummerNoteImageInterface $summerNoteImageService,
        ImageStorageInterface $headerImageService,
        ContentAlertInterface $contentAlertService,
        ProcessContentAlerts $processContentAlerts,
        LogServiceInterface $logService)
    {
        $this->middleware('verifyCategoryCount')->only(['create', 'store']);

        $this->tagService = $tagService;
        $this->summerNoteImageService = $summerNoteImageService;
        $this->headerImageService = $headerImageService;
        $this->contentAlertService = $contentAlertService;
        $this->processContentAlerts = $processContentAlerts;
        $this->logService = $logService;

        parent::__construct();
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.post.index')
            ->with('title', 'Active Posts')
            ->with('posts', Post::where('archived', '=', 0)->paginate(10));
    }

    /**
     * @return Application|Factory|View
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
        try {
            $img = '';
            if ($request->hasFile('header_image')) {
                $img = $this->headerImageService->store(
                    $request->header_image->getClientOriginalName(),
                    $request->header_image);
            }

            $post_content = $this->summerNoteImageService->storeImages($request->post_content);

            $post = Post::create([
                'title' => $request->title,
                'summary' => $request->summary,
                'post_content' => $post_content,
                'published_at' => $request->published_at,
                'category_id' => $request->category,
                'user_id' => auth()->user()->id,
                'header_image' => $img,
            ]);

            if ($request->tags) {
                $this->tagService->updateTags($post, $request->tags);
            }

            $title = rawurlencode($post->title);
            $url = url("/article/{$title}");

            $this->processContentAlerts::dispatch($this->contentAlertService, $post, $url)->onConnection('sqs');

            session()->flash('success', 'Post successfully created.');
        } catch (Exception $e) {
            $this->logService->error($e->getMessage(), [
                debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 10),
            ]);
        }

        return redirect(route('post.index'));
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
        try {
            $data = $request->only('title', 'summary', 'post_content', 'published_at', 'category');

            $data['post_content'] = $this->summerNoteImageService->storeImages($data['post_content']);
            $data['category_id'] = $request->category;

            if ($request->hasFile('header_image')) {
                $img = $this->headerImageService->store(
                    $request->header_image->getClientOriginalName(),
                    $request->header_image);
                $this->headerImageService->delete($post->header_image);
                $data['header_image'] = $img;
            }

            $post->update($data);

            $this->tagService->updateTags($post, $request->tags);

            session()->flash('success', 'Post updated successfully.');
        } catch (Exception $e) {
            $this->logService->error($e->getMessage(), [
                debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 10),
            ]);
        }

        return redirect(route('post.index'));
    }

    /**
     * @param Post $post
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Post $post)
    {
        try {
            $this->headerImageService->delete($post->header_image);
            $this->summerNoteImageService->destroyImages($post->post_content);
            $post->delete();
            session()->flash('success', 'Post deleted successfully');
        } catch (Exception $e) {
            $this->logService->error($e->getMessage(), [
                debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 10),
            ]);
        }

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
