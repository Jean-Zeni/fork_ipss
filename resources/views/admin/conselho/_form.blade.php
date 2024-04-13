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
            <script src="https://cdn.tiny.cloud/1/tscpebe2xv4vkktpkkorh3wcc0q4xctf2b7cuihi9z6f4j9u/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
            height: '300px',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ]
        });
    </script>