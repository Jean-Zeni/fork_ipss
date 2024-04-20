<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

@if(isset($membro->id))
<form method="post" action="{{ route('membro.update', ['membro' => $membro->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('membro.store') }}" enctype="multipart/form-data">
    @csrf
@endif
    <div class="row">
        <div class="col-6">
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ $membro->nome ?? old('nome') }}" placeholder="Nome" style="width: 100%;">
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}
        </div>
        <div class="col-6">
            <label>Função:</label>
            <input type="text" name="funcao" value="{{ $membro->funcao ?? old('funcao') }}" placeholder="Função/Cargo" style="width: 100%;">
            {{ $errors->has('funcao') ? $errors->first('funcao') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <label>Email:</label>
            <input type="text" name="email" value="{{ $membro->email ?? old('email') }}" placeholder="Email" style="width: 100%;">
            {{ $errors->has('email') ? $errors->first('email') : '' }}
        </div>
        <div class="col-6">
            <label>Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="{{ $membro->telefone ?? old('telefone') }}" placeholder="DDD + Número" style="width: 100%;">
            {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <label>Instagram:</label>
            <input type="text" name="instagram" value="{{ $membro->instagram ?? old('instagram') }}" placeholder="Instagram" style="width: 100%;">
            {{ $errors->has('instagram') ? $errors->first('instagram') : '' }}
        </div>
        <div class="col-6">
            <label>Facebook:</label>
            <input type="text" id="facebook" name="facebook" value="{{ $membro->facebook ?? old('facebook') }}" placeholder="Facebook" style="width: 100%;">
            {{ $errors->has('facebook') ? $errors->first('facebook') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <p><label>Descrição:</label></p>
            <textarea class="descricao" name="descricao" placeholder="Descrição" style="width: 100% !important;">{{ $membro->descricao ?? old('descricao') }}</textarea>
            {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            @if ($conselhos)            
                <select name="conselho_id">
                    <option> Selecione um Conselho ao qual o membro faz parte </option>
            
                        @foreach ($conselhos as $conselho)
                            <option value="{{$conselho->id}}" {{ ($membro->conselho_id ?? old('conselho_id')) == $conselho->id ? 'selected' : '' }}>{{$conselho->nome}}</option>
                        @endforeach
                </select>
                {{ $errors->has('conselho_id') ? $errors->first('conselho_id') : '' }}
            @endif
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <label>Resumo:</label>
            <textarea name="resumo" placeholder="Resumo" style="width: 100%;" rows="4" cols="50">{{ $membro->resumo ?? old('resumo') }}</textarea>
            {{ $errors->has('resumo') ? $errors->first('resumo') : '' }}
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
    @if(isset($membro))
        @if($membro->arquivo)
            <div class="row">
                <div class="col-12">
                    Arquivo: {{$membro->arquivo->nome_original}}
                    <a href="{{url('/')}}/storage/uploads/membro/{{$membro->arquivo->id}}/{{$membro->arquivo->arquivo}}"><img src="{{url('/')}}/storage/uploads/membro/{{$membro->arquivo->id}}/{{$membro->arquivo->arquivo}}" alt="membro"></a>
                </div>
            </div><br>
        @endif
    @endif
    <br>
    <div class="row">
        <div class="col-2">
            <input type="hidden" id="ativo" name="ativo" value="0">
            <input type="checkbox" id="ativo" name="ativo" value="1" @if(isset($membro)){{ $membro->ativo==1?'checked':'' }}@endif>
            <label for="ativo">Ativo</label>
        </div>
        <div class="col-2">
            <label>Ordem:</label>
            <input type="number" id="ordem" name="ordem" value="{{ $membro->ordem ?? old('ordem') }}" placeholder="Ordem">
            {{ $errors->has('ordem') ? $errors->first('ordem') : '' }}
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Cadastrar</button>
<form>
<br><br><br>

<script type="text/javascript">
    $("#telefone").mask("(00) 00000-0000");
</script>

<script>
    tinymce.init({
        selector:'textarea.descricao',
        language: 'pt_BR',
    });
</script>