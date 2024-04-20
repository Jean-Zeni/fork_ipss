@if(isset($pagina->id))
<form method="post" action="{{ route('pagina.update', ['pagina' => $pagina->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('pagina.store') }}" enctype="multipart/form-data">
    @csrf
@endif
    <div class="row">
        <div class="col-12">
            <label>Título:</label>
            <input type="text" name="titulo" value="{{ $pagina->titulo ?? old('titulo') }}" placeholder="Título" style="width: 100%;">
            {{ $errors->has('titulo') ? $errors->first('titulo') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <label>Resumo:</label>
            <textarea name="resumo" placeholder="Resumo" style="width: 100%;" rows="4" cols="50">{{ $pagina->resumo ?? old('resumo') }}</textarea>
            {{ $errors->has('resumo') ? $errors->first('resumo') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <p><label>Descrição:</label></p>
            <textarea class="descricao" name="descricao" placeholder="Descrição" style="width: 100% !important;">{{ $pagina->descricao ?? old('descricao') }}</textarea>
            {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <p><label>Inserir link contido no src do incorporar (youtube->compartilhar->incorporar):</label></p>
            <input type="text" name="link_youtube" value="{{ $pagina->link_youtube ?? old('link_youtube') }}" placeholder="Youtube" style="width: 100%;">
            {{ $errors->has('link_youtube') ? $errors->first('link_youtube') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" name="arquivos[]" id="customFileLangHTML" multiple>
                <label for="customFileLangHTML" class="custom-file-label" data-browse="Enviar Imagens"></label>
            </div>
        </div>
    </div>
    @if (isset($pagina))      
        <div class="row">
            <div class="col-12">
                @component('admin.pagina._components._grid_arquivos_form', ['pagina' => $pagina])
                @endcomponent
            </div>
        </div>
    @endif
    <br>
    <div class="row">
        <div class="col-2">
            <input type="hidden" id="ativo" name="ativo" value="0">
            <input type="checkbox" id="ativo" name="ativo" value="1" @if(isset($pagina)){{ $pagina->ativo==1?'checked':'' }}@endif>
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
