<?php
use App\Models\Contato;
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

@if(isset($contato->id))
<form method="post" action="{{ route('contato.update', ['contato' => $contato->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('contato.store') }}" enctype="multipart/form-data">
    @csrf
@endif
    <div class="row">
        <div class="col-6">
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ $contato->nome ?? old('nome') }}" placeholder="Nome" style="width: 100%;" {{isset($contato->nome) ? "disabled" : ""}}>
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}
        </div>
        <div class="col-6">
            <label>Tipo:</label>
            <select name="tipo" style="width: 100%;" {{isset($contato->tipo) ? "disabled" : ""}}>
                <option> Selecione </option>
                <option value="3" @if(isset($contato)){{ ($contato->tipo ?? old('tipo')) == Contato::TIPO_CONTATO ? 'selected' : '' }}@endif> Contato </option>
                <option value="4" @if(isset($contato)){{ ($contato->tipo ?? old('tipo')) == Contato::TIPO_CONTATO_EVANGELISMO  ? 'selected' : '' }}@endif> Dúvida Contato </option>
            </select>
            {{ $errors->has('tipo') ? $errors->first('tipo') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <label>Email:</label>
            <input type="text" name="email" value="{{ $contato->email ?? old('email') }}" placeholder="email" style="width: 100%;" {{isset($contato->email) ? "disabled" : ""}}>
            {{ $errors->has('email') ? $errors->first('email') : '' }}
        </div>
        <div class="col-6">
            <label>Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="{{ $contato->telefone ?? old('telefone') }}" placeholder="telefone" style="width: 100%;" {{isset($contato->telefone) ? "disabled" : ""}}>
            {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <p><label>Mensagem:</label></p>
            <textarea class="mensagem" name="mensagem" placeholder="Mensagem" style="width: 100% !important;" rows="4" cols="50" {{isset($contato->mensagem) ? "disabled" : ""}}>{{ $contato->mensagem ?? old('mensagem') }}</textarea>
            {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
        </div>
    </div>
    <br>
     <div class="row">
        <div class="col-2">
            <input type="hidden" id="ativo" name="ativo" value="0">
            <input type="checkbox" id="ativo" name="ativo" value="1" @if(isset($contato)){{ $contato->ativo==1?'checked':'' }}@endif>
            <label for="ativo">Ativo</label>
        </div>
    </div>
    <br>
    <div class="row">
         <div class="col-8">
            <p><label>Resposta:</label></p>
            <textarea class="resposta" name="resposta" placeholder="Resposta" rows="4" cols="50" style="width: 100% !important;">{{ $contato->resposta ?? old('resposta') }}</textarea>
            {{ $errors->has('resposta') ? $errors->first('resposta') : '' }}
        </div>
        <div class="col-4">
            <label>Status:</label>
            <select name="status" style="width: 100%;">
                <option> Selecione </option>
                <option value="1" @if(isset($contato)){{ ($contato->status ?? old('status')) == Contato::STATUS_ABERTO ? 'selected' : '' }}@endif> Aberto </option>
                <option value="2" @if(isset($contato)){{ ($contato->status ?? old('status')) == Contato::STATUS_RESPONDIDO ? 'selected' : '' }}@endif> Respondido </option>
            </select>
            {{ $errors->has('status') ? $errors->first('status') : '' }}
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Cadastrar</button>
<form>
<br><br><br>

<script type="text/javascript">
    $("#telefone").mask("(00) 00000-0000");
</script>

