<?php

namespace App\Mail;

use App\PostComment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResponseAlert extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var PostComment
     */
    public $comment;

    /**
     * @var string
     */
    public $postUrl;

    /**
     * ResponseAlert constructor.
     * @param PostComment $comment
     * @param string $postUrl
     */
    public function __construct(PostComment $comment, $postUrl)
    {
        $this->comment = $comment;
        $this->postUrl = $postUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.response');
    }
}
