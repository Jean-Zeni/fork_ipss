@unless ($breadcrumbs->isEmpty())
    <section class="bg-breadcrumb">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 text-right">
                    <ol class="breadcrumb">
                        @foreach ($breadcrumbs as $breadcrumb)

                            @if (!is_null($breadcrumb->url) && !$loop->last)
                                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                            @else
                                <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                            @endif

                        @endforeach
                    </ol>
                </div>
            </div>
        </div> 
    </section>   
@endunless