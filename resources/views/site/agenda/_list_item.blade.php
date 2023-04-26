<div class="col-4">
    <div class="box-evento">
        <div class="col texto">
            <h4><strong>{{$evento->title}}</strong></h4>
            @if ($evento->start)
                Data de início: {{$evento->start->format('d/m/Y')}} às {{$evento->start->format('H:i')}}hrs<br />
            @endif
            @if ($evento->end)
                Data de término: {{$evento->end->format('d/m/Y')}} às {{$evento->end->format('H:i')}}hrs<br />
            @endif
            @if ($evento->local)
                Local: {{$evento->local}}<br />
            @endif
            @if ($evento->resumo)
                {{$evento->resumo}}
            @endif
            <div class="tarja"></div>
        </div>
    </div>
</div>