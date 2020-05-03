@if(session()->has('success') or session()->has('error'))
    <div class="alert__container">
        @if(session()->has('success'))
            <div class="alert__container--alert alert__container--success">
                {{session()->get('success')}}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert__container--alert alert__container--danger">
                {{session()->get('error')}}
            </div>
        @endif
    </div>

    <script>
        setTimeout(function() {
            jQuery('.alert__container').fadeOut("slow");
        }, 5000);
    </script>

@endif
