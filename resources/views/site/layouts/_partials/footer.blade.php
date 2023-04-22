<footer>
    <div class="row container-fluid borda-top">
        <div class="col-12 col-md-12 col-lg-6 text-center logo-footer">
            <img src="{{url('/')}}/images/logo-ipss.png" alt="IPSS">
            <div id="nome-observatorio"><strong>IGREJA PRESBITERIANA</strong></div>
            <div id="nome-ifsul">de Sapucaia do Sul</div>
        </div>
        <div class="col-12 col-md-12 col-lg-6 text-center margin-footer-responsiva"  style="margin-top: 45px;">
            <?=$config->rodape?>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <br>
                        @if ($config->facebook)    
                            <a href="{{$config->facebook}}" target="_blank" class="midia-footer">
                                <img src="{{url('/')}}/images/facebook.png" alt="Facebook" width="44" class="efeito-midia midia-footer-resp">
                            </a>
                        @endif
                        @if ($config->instagram)      
                            <a href="{{$config->facebook}}" target="_blank" class="midia-footer">
                                <img src="{{url('/')}}/images/instagram.png" alt="Instagram" width="44" class="efeito-midia midia-footer-resp">
                            </a>
                        @endif
                        @if ($config->youtube)    
                            <a href="{{$config->youtube}}" target="_blank" class="midia-footer">
                                <img src="{{url('/')}}/images/youtube.png" alt="Youtube" width="44" class="efeito-midia midia-footer-resp">
                            </a>
                        @endif
                        @if ($config->twiiter)      
                            <a href="{{$config->twitter}}" target="_blank" class="midia-footer">
                                <img src="{{url('/')}}/images/twitter.png" alt="Twiiter" width="44" class="efeito-midia midia-footer-resp">
                            </a>
                        @endif
                        @if ($config->spotify)    
                            <a href="{{$config->spotify}}" target="_blank" class="midia-footer">
                                <img src="{{url('/')}}/images/spotify.png" alt="Spotify" width="44" class="efeito-midia midia-footer-resp">
                            </a>
                        @endif
                        @if ($config->whatsapp)     
                            <a href="{{$config->whatsapp}}" target="_blank" class="midia-footer">
                                <img src="{{url('/')}}/images/whatsapp.png" alt="Whatsapp" width="44" class="efeito-midia midia-footer-resp">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div>
        <div class="row container-fluid rodape-resp">
            <div class="col-6">
                <p class="float-start">&copy; {{ config('app.name', 'Laravel') }} {{ date('Y') }}</p>
            </div>
            <div class="col-6">
                <p class="float-end">Desenvolvido por <a href="https://www.linkedin.com/in/giordani-da-silveira-dos-santos-1b8168182/" target="_blank">Giordani</a></p>
            </div>
        </div>
    </div>
</footer>