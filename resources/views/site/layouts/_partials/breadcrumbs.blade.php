@unless ($breadcrumbs->isEmpty())
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">@yield('titulo')</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    @foreach ($breadcrumbs as $breadcrumb)
                        @if (!is_null($breadcrumb->url) && !$loop->last)
                            <li class="breadcrumb-item"><a a class="text-white" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                        @else
                            <li class="breadcrumb-item text-white active" aria-current="page">{{ $breadcrumb->title }}</li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
@endunless