<?php
namespace App\Services\Notification;

use App\PostComment;

interface ResponseAlertInterface
{
    /**
     * @param PostComment $comment
     * @param string $url
     */
    public function sendAlerts(PostComment $comment, $url) : void;
}
