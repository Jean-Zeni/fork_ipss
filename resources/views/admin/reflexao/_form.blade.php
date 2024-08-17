@if(isset($reflexao->id))
<form method="post" action="{{ route('reflexao.update', ['reflexao' => $reflexao->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('reflexao.store') }}" enctype="multipart/form-data">
    @csrf
@endif
    <div class="row">
        <div class="col-12">
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ $reflexao->nome ?? old('nome') }}" placeholder="Nome" style="width: 100%;">
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <p><label>Resumo:</label></p>
            <textarea class="resumo" name="resumo" placeholder="resumo" style="width: 100% !important;" rows="4" cols="50">{{ $reflexao->resumo ?? old('resumo') }}</textarea>
            {{ $errors->has('resumo') ? $errors->first('resumo') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <p><label>Descrição:</label></p>
            <textarea class="descricao" name="descricao" placeholder="Descrição" style="width: 100% !important;">{{ $reflexao->descricao ?? old('descricao') }}</textarea>
            {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            @if ($membros)            
                <select name="membro_id">
                    <option> Selecione o membro </option>
                    @foreach ($membros as $membro)
                        <option value="{{$membro->id}}" {{ ($reflexao->membro_id ?? old('membro_id')) == $membro->id ? 'selected' : '' }}>{{$membro->nome}}</option>
                    @endforeach
                </select>
                {{ $errors->has('membro_id') ? $errors->first('membro_id') : '' }}
            @endif
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-2">
            <input type="hidden" id="ativo" name="ativo" value="0">
            <input type="checkbox" id="ativo" name="ativo" value="1" @if(isset($reflexao)){{ $reflexao->ativo==1?'checked':'' }}@endif>
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