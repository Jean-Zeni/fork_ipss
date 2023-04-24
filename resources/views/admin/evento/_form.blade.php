@if(isset($evento->id))
<form method="post" action="{{ route('evento.update', ['evento' => $evento->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('evento.store') }}" enctype="multipart/form-data">
    @csrf
@endif
    <div class="row">
        <div class="col-6">
            <label>Título:</label>
            <input type="text" name="title" value="{{ $evento->title ?? old('title') }}" placeholder="Título" style="width: 100%;">
            {{ $errors->has('title') ? $errors->first('title') : '' }}
        </div>
        <div class="col-6">
            <label>Local:</label>
            <input type="text" name="local" value="{{ $evento->local ?? old('local') }}" placeholder="Local" style="width: 100%;">
            {{ $errors->has('local') ? $errors->first('local') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <p><label>Resumo:</label></p>
            <textarea class="resumo" name="resumo" placeholder="resumo" style="width: 100% !important;" rows="4" cols="50">{{ $evento->resumo ?? old('resumo') }}</textarea>
            {{ $errors->has('resumo') ? $errors->first('resumo') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <label>Data inicio:</label>
            <input type="datetime-local" class="form-control" name="start" value="{{ $evento->start ?? old('start') }}"  placeholder="Data ínicio">
            {{ $errors->has('start') ? $errors->first('start') : '' }}
        </div>
        <div class="col-6">
            <label>Data fim:</label>
            <input type="datetime-local" class="form-control" name="end" value="{{ $evento->end ?? old('end') }}"  placeholder="Data Fim">
            {{ $errors->has('end') ? $errors->first('end') : '' }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <p><label>Descrição:</label></p>
            <textarea class="descricao" name="descricao" placeholder="descricao" style="width: 100% !important;" rows="4" cols="50">{{ $evento->descricao ?? old('descricao') }}</textarea>
            {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Cadastrar</button>
<form>
<br><br><br>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    config = {
        enableTime: true,
        dateFormat: 'Y-m-d H:i',
        locale: 'pt-BR',
    }
    flatpickr("input[type=datetime-local]", config);
</script>