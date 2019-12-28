@if(session()->has('success') or session()->has('error'))
    <div class="row mb30">
        <div class="col">
            @if(session()->has('success'))
                <div class="alert alert-success rounded">
                    {{session()->get('success')}}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger rounded">
                    {{session()->get('error')}}
                </div>
            @endif
        </div>
    </div>
@endif
