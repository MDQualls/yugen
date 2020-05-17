@if($errors->any())
    <div class="alert__container">
        <div class="alert__container--alert alert__container--danger">
            <h3 class="h3__title">Errors occurred during submission</h3>
            <ul class="list-unstyled">
                @foreach($errors->all() as $error )
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script>
        setTimeout(function() {
            jQuery('.alert__container').fadeOut("slow");
        }, 5000);
    </script>
@endif
