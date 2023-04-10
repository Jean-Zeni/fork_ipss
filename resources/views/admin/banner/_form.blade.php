@if(isset($banner->id))
<form method="post" action="{{ route('banner.update', ['banner' => $banner->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('banner.store') }}" enctype="multipart/form-data">
    @csrf
@endif
    <div class="row">
        <div class="col-10">
            <input type="text" name="titulo" value="{{ $banner->titulo ?? old('titulo') }}" placeholder="Título" style="width: 100%;">
            {{ $errors->has('titulo') ? $errors->first('titulo') : '' }}
        </div>
        <div class="col-2">
            <select name="tipo_posicao" style="width: 100%;">
                    <option> Tipo Posição </option>
                    <option value="cap" @if(isset($banner)){{ ($banner->tipo_posicao ?? old('tipo_posicao')) == $banner->tipo_posicao ? 'selected' : '' }}@endif> Capa </option>
            </select>
            {{ $errors->has('tipo_posicao') ? $errors->first('tipo_posicao') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <input type="datetime-local" class="form-control" name="data_inicio" value="{{ $banner->data_inicio ?? old('data_inicio') }}"  placeholder="Data ínicio">
            {{ $errors->has('data_inicio') ? $errors->first('data_inicio') : '' }}
        </div>
        <div class="col-6">
            <input type="datetime-local" class="form-control" name="data_fim" value="{{ $banner->data_fim ?? old('data_fim') }}"  placeholder="Data Fim">
            {{ $errors->has('data_fim') ? $errors->first('data_fim') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <input type="text" name="link" value="{{ $banner->link ?? old('link') }}" placeholder="Link" style="width: 100%;">
            {{ $errors->has('link') ? $errors->first('link') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-4">
            <select name="tipo_documento">
                    <option> Tipo Documento </option>
                    <option value="VI" @if(isset($banner)){{ ($banner->tipo_documento ?? old('tipo_documento')) == $banner->tipo_documento ? 'selected' : '' }}@endif> Vídeo </option>
                    <option value="IM" @if(isset($banner)){{ ($banner->tipo_documento ?? old('tipo_documento')) == $banner->tipo_documento ? 'selected' : '' }}@endif> Imagem </option>
            </select>
            {{ $errors->has('tipo_documento') ? $errors->first('tipo_documento') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <input type="file" id="arquivo" name="arquivo"><br><br>
            {{ $errors->has('arquivo') ? $errors->first('arquivo') : '' }}
        </div>
    </div>
    @if(isset($banner))
        @if($banner->arquivo)
            <div class="row">
                <div class="col-12">
                    Arquivo: {{$banner->arquivo->nome_original}}
                    <a href="{{url('/')}}/storage/uploads/banner/{{$banner->arquivo->id}}/{{$banner->arquivo->arquivo}}"><img src="{{url('/')}}/storage/uploads/banner/{{$banner->arquivo->id}}/{{$banner->arquivo->arquivo}}" alt="Banner"></a>
                </div>
            </div><br>
        @endif
    @endif
    <br>
    <div class="row">
        <div class="col-2">
            <input type="checkbox" id="ativo" name="ativo" value="1" @if(isset($banner)){{ $banner->ativo==1?'checked':'' }}@endif>
            <label for="ativo">Ativo</label>
        </div>
        <div class="col-2">
            <input type="checkbox" id="nova_guia" name="nova_guia" value="1" @if(isset($banner)){{ $banner->nova_guia==1?'checked':'' }}@endif>
            <label for="nova_guia">Nova Guia</label>
        </div>
        <div class="col-2">
            <input type="number" id="ordem" name="ordem" value="{{ $banner->ordem ?? old('ordem') }}" placeholder="Ordem">
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Cadastrar</button>
<form>
<br><br><br>
