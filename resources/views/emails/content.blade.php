@component('mail::message')

# Yugen Farm Content Alert


{{$post->user->name}} has created a new blog post titled *{{$post->title}}*.  To view the new blog post, click the button below.

@component('mail::button', ['url' => $postUrl])
    View Post
@endcomponent

Thank you,
{{ config('app.name') }}

---
If you no longer wish to receive these alerts, please update your user settings at [Yugen Farm](https://www.yugenfarm.com).
@endcomponent
