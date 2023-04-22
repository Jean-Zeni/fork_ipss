<div class="box-lista-noticia">
    <div class="row">
        <div class="col-12 nopadding imagem-lista">
            @if ($membro->arquivo)
                <img src="{{url('/')}}/storage/uploads/membro/{{$membro->arquivo->id}}/{{$membro->arquivo->arquivo}}" alt="Membro" width="100%">
            @endif
        </div>
        <div class="col texto texto-noticia">
            <h4><strong>{{$membro->nome}}</strong></h4><hr />
                @if ($membro->funcao)
                    Cargo: {{$membro->funcao}}<br>
                @endif
                @if ($membro->email)   
                    Email: {{$membro->email}}<br>
                @endif
                @if ($membro->telefone) 
                    Telefone: {{$membro->telefone}}<br>
                @endif
            <div class="tarja"></div>
        </div>
    </div>
</div>