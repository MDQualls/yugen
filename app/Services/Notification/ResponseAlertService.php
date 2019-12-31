<?php

namespace App\Services\Notification;


use App\Mail\ResponseAlert;
use App\PostComment;
use Illuminate\Support\Facades\Mail;

class ResponseAlertService implements ResponseAlertInterface
{
    /**
     * @param PostComment $comment
     * @param string $url
     */
    public function sendAlerts(PostComment $comment, $url) : void
    {
        if ($comment->parent_comment_id == 0) {
            return;
        }

        $parentComment = PostComment::where('id', '=', $comment->parent_comment_id)->first();

        if(!$parentComment)  {
            return;
        }

        //keep track of the user ID's that have already be mailed so that we don't send multiple mails to same person
        $alerted = [];

        //send alert to original commenter
        if ($parentComment->user->response_alert) {
            Mail::to($parentComment->user)->send(new ResponseAlert($parentComment, $url));
            $alerted[] = $parentComment->user->id;
        }

        //send alert to all that replied to the original comment
        foreach ($parentComment->replys as $reply) {

            //do not send alert to the person that posted this comment
            if($reply->user->id == $comment->user->id)  {
                continue;
            }

            if ($reply->user->response_alert && !in_array($reply->user->id, $alerted)) {
                Mail::to($reply->user)->send(new ResponseAlert($parentComment, $url));
                $alerted[] = $reply->user->id;
            }
        }
    }
}
