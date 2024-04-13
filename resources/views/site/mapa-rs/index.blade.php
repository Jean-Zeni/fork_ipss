@extends('site.layouts.main')

@section('titulo', 'Igrejas Prebisterianas do Brasil no RS')

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script type="module" src="/js/mapa.js"></script>

@section('conteudo')
    {{ Breadcrumbs::render('mapa-rs') }}
    <div class="container-xxl ">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-5">Igrejas Prebisterianas do Brasil no Rio Grande do Sul</h2>
            </div>
            <div class="row g-4">
                <div id="map"></div>
                <script>
                    var key = '{{env('GOOGLE_MAPS_API_KEY')}}';
                    (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
                    ({key: key, v: "beta"});
                </script>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    window.onload = function () { 
        document.getElementById('icon-zap').style.cssText = 'margin-top:12px;';
    } 
</script>
