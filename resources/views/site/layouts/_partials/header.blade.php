<header>
    <div class="row bg-green midias-topo">
        <div class="col-12">
            <div class="text-right margin-midiasT">
                <br><br>
                @if ($config->facebook)             
                    <a href="{{$config->facebook}}" target="_blank" class="midia-footer">
                        <img src="{{url('/')}}/images/facebook.png" alt="Facebook" width="24" class="midia-topo">
                    </a>
                @endif
                @if ($config->instagram)    
                    <a href="{{$config->instagram}}" target="blank" class="midia-footer">
                        <img src="{{url('/')}}/images/instagram.png" alt="Instagram" width="24" class="midia-topo">
                    </a>
                @endif
                @if ($config->youtube)    
                    <a href="{{$config->youtube}}" target="_blank" class="midia-footer">
                        <img src="{{url('/')}}/images/youtube.png" alt="Youtube" width="24" class="midia-topo">
                    </a>
                @endif
                @if ($config->twitter)     
                    <a href="{{$config->twitter}}" target="_blank" class="midia-footer">
                        <img src="{{url('/')}}/images/twitter.png" alt="Twitter" width="24" class="midia-topo">
                    </a>
                @endif
                @if ($config->spotify)    
                    <a href="{{$config->spotify}}" target="_blank" class="midia-footer">
                        <img src="{{url('/')}}/images/spotify.png" alt="Spotify" width="24" class="midia-topo">
                    </a>
                @endif
                @if ($config->whatsapp)        
                    <a href="{{$config->whatsapp}}" target="_blank" class="midia-footer">
                        <img src="{{url('/')}}/images/whatsapp.png" alt="Whatsapp" width="24" class="midia-topo">
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div id="logo" class="bg-dark">
        <div class="row margin-menu">
            <div id="logo-menu" class="col-10 col-md-10 col-lg-8 col-xl-4 nopadding">
                <div class="col-4">
                    <a href="/" title="IPSS">
                    <h1 class="nopadding nomargin"><img src="{{url('/')}}/images/logo-ipss.png" alt="IPSS"></h1>
                    </a>  
                </div>
                <div class="col-8">
                <a href="/" title="IPSS">
                    <h1 class="titulo-logo">
                        Igreja Presbiteriana 
                        <br><small>de Sapucaia do Sul</small>
                    </h1>
                </a>  
                </div>
            </div>
            <div id="posicao-menu" class="col-2 col-md-2 col-lg-4 col-xl-8">
                @include('site.layouts._partials.menu')
                <span data-menu-toggle="menu" class="menu-fechado"><i> menu</span>
            </div>
        </div>
    </div>
</header>