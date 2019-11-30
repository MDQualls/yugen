@section('header_section')
    @if(isset($title) && $title == 'Archived Posts')
        <header id="main-header" class="py-2 bg-warning">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1><i class="fas fa-archive"></i> Archived Posts</h1>
                    </div>
                </div>
            </div>
        </header>
    @else
        <header id="main-header" class="py-2 bg-primary text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1><i class="fas fa-pencil-alt"></i> Posts</h1>
                    </div>
                </div>
            </div>
        </header>
    @endif
@endsection('header_section')
