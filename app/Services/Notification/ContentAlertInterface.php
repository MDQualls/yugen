<?php
namespace App\Services\Notification;

use App\Post;

interface ContentAlertInterface
{
    public function sendAlerts(Post $post, $url) : void;
}
