<?php

namespace App\Jobs;

use App\Post;
use App\Services\Notification\ContentAlertInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessContentAlerts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Post
     */
    protected $post;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var ContentAlertInterface
     */
    protected $contentAlertService;

    /**
     * Create a new job instance.
     *
     * @param ContentAlertInterface $contentAlertService
     * @param Post $post
     * @param $url
     */
    public function __construct(
        ContentAlertInterface $contentAlertService,
        Post $post,
        $url = ''
    ){
        $this->contentAlertService = $contentAlertService;
        $this->post = $post;
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->contentAlertService->sendAlerts($this->post, $this->url);
    }
}
