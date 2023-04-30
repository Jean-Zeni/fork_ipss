@push('styles')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
@endpush
<div class="swiper mySwiper" style="z-index: -1 !important;">
    <div class="swiper-wrapper">
        @foreach ($arquivos as $arquivo)
            @if ($arquivo->tipo == "I")
                @if ($arquivo->arquivo != $nomeArquivoCapa)
                    <div class="swiper-slide">
                        <img src="{{url('/')}}/storage/uploads/pagina/{{$arquivo->id}}/{{$arquivo->arquivo}}" alt="{{$arquivo->nome_original}}" width="100%">
                    </div>
                @endif
            @endif
        @endforeach
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
    <div class="swiper-scrollbar"></div>
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
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    mousewheel: true,
    keyboard: true,
    });
</script>
@endpush