@component('mail::message')

# Yugen Farm Response Alert


Another user has replied to your comment on the blog post *{{$comment->post->title}}*.  To view the comment, click the button below.

@component('mail::button', ['url' => $postUrl])
    View Comment
@endcomponent

Thank you,
{{ config('app.name') }}

---
If you no longer wish to receive these alerts, please update your user settings at [Yugen Farm](https://www.yugenfarm.com).
@endcomponent
