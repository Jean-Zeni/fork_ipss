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