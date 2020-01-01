<?php

namespace App\Services\Notification;


use App\Mail\ContentAlert;
use App\Post;
use App\PostComment;
use App\User;
use Illuminate\Support\Facades\Mail;

class ContentAlertService implements ContentAlertInterface
{
    /**
     * @param Post $post
     * @param string $url
     */
    public function sendAlerts(Post $post, $url) : void
    {
        //keep track of the user ID's that have already be mailed so that we don't send multiple mails to same person
        $alerted = [];

        $alertUsers = User::where('content_alert','=',1)->get();

        foreach ($alertUsers as $user)
        {
            //do not send alert to user that posted the new content
            if($user->id == $post->user->id)  {
                continue;
            }

            Mail::to($user)->send(new ContentAlert($post, $url));
            $alerted[] = $user->id;
        }
    }
}
