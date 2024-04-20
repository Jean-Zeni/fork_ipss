@if(isset($conselho->id))
<form method="post" action="{{ route('conselho.update', ['conselho' => $conselho->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('conselho.store') }}" enctype="multipart/form-data">
    @csrf
@endif
    <div class="row">
        <div class="col-12">
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ $conselho->nome ?? old('nome') }}" placeholder="Nome" style="width: 100%;">
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-12">
            <p><label>Descrição:</label></p>
            <textarea class="descricao" name="descricao" placeholder="Descrição" style="width: 100% !important;">{{ $conselho->descricao ?? old('descricao') }}</textarea>
            {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-12">
            <input type="file" id="arquivo" name="arquivo"><br><br>
            {{ $errors->has('arquivo') ? $errors->first('arquivo') : '' }}
        </div>
    </div>
    @if(isset($conselho))
        @if($conselho->arquivo)
            <div class="row">
                <div class="col-12">
                    Arquivo: {{$conselho->arquivo->nome_original}}
                    <a href="{{url('/')}}/storage/uploads/conselho/{{$conselho->arquivo->id}}/{{$conselho->arquivo->arquivo}}"><img src="{{url('/')}}/storage/uploads/conselho/{{$conselho->arquivo->id}}/{{$conselho->arquivo->arquivo}}" alt="conselho"></a>
                </div>
            </div><br>
        @endif
    @endif
    <br>
    <div class="row">
        <div class="col-2">
            <input type="hidden" id="ativo" name="ativo" value="0">
            <input type="checkbox" id="ativo" name="ativo" value="1" @if(isset($conselho)){{ $conselho->ativo==1?'checked':'' }}@endif>
            <label for="ativo">Ativo</label>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Cadastrar</button>
<form>
<br><br><br>

<script>
    tinymce.init({
        selector:'textarea.descricao',
        language: 'pt_BR',
    });
</script>