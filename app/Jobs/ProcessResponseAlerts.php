<?php

namespace App\Jobs;

use App\PostComment;
use App\Services\Notification\ResponseAlertInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessResponseAlerts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var PostComment
     */
    protected $comment;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var ResponseAlertInterface
     */
    protected $responseAlertService;

    /**
     * Create a new job instance.
     *
     * @param ResponseAlertInterface $responseAlertService
     * @param PostComment $comment
     * @param string $url
     */
    public function __construct(
        ResponseAlertInterface $responseAlertService,
        PostComment $comment,
        $url = ''
    ){
        $this->responseAlertService = $responseAlertService;
        $this->comment = $comment;
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->responseAlertService->sendAlerts($this->comment, $this->url);
    }
}
