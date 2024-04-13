@if(isset($igreja->id))
<form method="post" action="{{ route('igreja.update', ['igreja' => $igreja->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('igreja.store') }}" enctype="multipart/form-data">
    @csrf
@endif
    <div class="row">
        <div class="col-12">
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ $igreja->nome ?? old('nome') }}" placeholder="Nome" style="width: 100%;">
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <label>Endereço:</label>
            <input type="text" name="endereco" value="{{ $igreja->endereco ?? old('endereco') }}" placeholder="Endereço" style="width: 100%;">
            {{ $errors->has('endereco') ? $errors->first('endereco') : '' }}
        </div>
        <div class="col-6">
            <label>Link Site:</label>
            <input type="text" name="link_site" value="{{ $igreja->link_site ?? old('link_site') }}" placeholder="Link Site" style="width: 100%;">
            {{ $errors->has('link_site') ? $errors->first('link_site') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <label>Resumo:</label>
            <textarea name="resumo" placeholder="Resumo" style="width: 100%;" rows="4" cols="50">{{ $igreja->resumo ?? old('resumo') }}</textarea>
            {{ $errors->has('resumo') ? $errors->first('resumo') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <label>Latitude:</label>
            <input type="text" name="latitude" value="{{ $igreja->latitude ?? old('latitude') }}" placeholder="Latitude" style="width: 100%;">
            {{ $errors->has('latitude') ? $errors->first('latitude') : '' }}
        </div>
        <div class="col-6">
            <label>Longitude:</label>
            <input type="text" name="longitude" value="{{ $igreja->longitude ?? old('longitude') }}" placeholder="Longitude" style="width: 100%;">
            {{ $errors->has('longitude') ? $errors->first('longitude') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <input type="file" id="arquivo" name="arquivo"><br><br>
            {{ $errors->has('arquivo') ? $errors->first('arquivo') : '' }}
        </div>
    </div>
    @if(isset($igreja))
        @if($igreja->arquivo)
            <div class="row">
                <div class="col-12">
                    Arquivo: {{$igreja->arquivo->nome_original}}
                    <a href="{{url('/')}}/storage/uploads/igreja/{{$igreja->arquivo->id}}/{{$igreja->arquivo->arquivo}}"><img src="{{url('/')}}/storage/uploads/igreja/{{$igreja->arquivo->id}}/{{$igreja->arquivo->arquivo}}" alt="Igreja"></a>
                </div>
            </div><br>
        @endif
    @endif
    <br>
    <div class="row">
        <div class="col-2">
            <input type="hidden" id="ativo" name="ativo" value="0">
            <input type="checkbox" id="ativo" name="ativo" value="1" @if(isset($igreja)){{ $igreja->ativo==1?'checked':'' }}@endif>
            <label for="ativo">Ativo</label>
        </div>
        <div class="col-2">
            <input type="hidden" id="congregacao" name="congregacao" value="0">
            <input type="checkbox" id="congregacao" name="congregacao" value="1" @if(isset($igreja)){{ $igreja->congregacao==1?'checked':'' }}@endif>
            <label for="congregacao">Congregação</label>
        </div>
        <div class="col-2">
            <input type="hidden" id="igreja_sapucaia" name="igreja_sapucaia" value="0">
            <input type="checkbox" id="igreja_sapucaia" name="igreja_sapucaia" value="1" @if(isset($igreja)){{ $igreja->igreja_sapucaia==1?'checked':'' }}@endif>
            <label for="igreja_sapucaia">Igreja de Sapucaia</label>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Cadastrar</button>
<form>
<br><br><br>
