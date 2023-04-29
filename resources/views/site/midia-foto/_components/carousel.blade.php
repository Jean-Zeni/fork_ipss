@push('styles')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
@endpush
<div class="swiper mySwiper" style="z-index: -1 !important;">
    <div class="swiper-wrapper">
        @foreach ($fotos as $foto)
            <div class="swiper-slide">
                <img src="{{url('/')}}/storage/uploads/foto/{{$foto->id}}/{{$foto->arquivo}}" alt="{{$foto->nome_original}}" width="100%">
            </div>
        @endforeach
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
@push('scripts')
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        autoplay: {
        delay: 5000,
    },
    cssMode: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
    },
    mousewheel: true,
    keyboard: true,
    });
</script>
@endpush