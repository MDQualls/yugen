<?php

namespace App\Mail;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContentAlert extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Post
     */
    public $post;

    /**
     * @var string
     */
    public $postUrl;

    /**
     * ResponseAlert constructor.
     * @param Post $comment
     * @param string $postUrl
     */
    public function __construct(Post $post, $postUrl)
    {
        $this->post = $post;
        $this->postUrl = $postUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.content');
    }
}
