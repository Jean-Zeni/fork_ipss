<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

@if(isset($configuracao->id))
    <form method="post" action="{{ route('admin.configuracao.update', ['configuracao' => $configuracao]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <label>Nome:</label>
                <input type="text" name="nome" value="{{ $configuracao->nome ?? old('nome') }}" placeholder="Nome" style="width: 100%;">
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <label>Endereço:</label>
                <input type="text" name="endereco" value="{{ $configuracao->endereco ?? old('endereco') }}" placeholder="Endereço" style="width: 100%;">
                {{ $errors->has('endereco') ? $errors->first('endereco') : '' }}
            </div>
            <div class="col-6">
                <label>Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="{{ $configuracao->telefone ?? old('telefone') }}" placeholder="Telefone" style="width: 100%;">
                {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <p><label>GoogleMaps:</label></p>
                <textarea class="resposta" name="googlemaps" placeholder="googlemaps" rows="4" cols="50" style="width: 100% !important;">{{ $configuracao->googlemaps ?? old('googlemaps') }}</textarea>
                {{ $errors->has('googlemaps') ? $errors->first('googlemaps') : '' }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <p><label>Rodapé:</label></p>
                <textarea class="rodape" name="rodape" placeholder="Rodapé" style="width: 100% !important;">{{ $configuracao->rodape ?? old('rodape') }}</textarea>
                <script src="https://cdn.tiny.cloud/1/tscpebe2xv4vkktpkkorh3wcc0q4xctf2b7cuihi9z6f4j9u/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                {{ $errors->has('rodape') ? $errors->first('rodape') : '' }}
            </div>
        </div>
        <br>
        <legend>Mídias Sociais</legend>
        <br>
        <div class="row">
            <div class="col-6">
                <label>Instagram:</label>
                <input type="text" name="instagram" value="{{ $configuracao->instagram ?? old('instagram') }}" placeholder="Instagram" style="width: 100%;">
                {{ $errors->has('instagram') ? $errors->first('instagram') : '' }}
            </div>
            <div class="col-6">
                <label>Twitter:</label>
                <input type="text" name="twiiter" value="{{ $configuracao->twiiter ?? old('twiiter') }}" placeholder="Twitter" style="width: 100%;">
                {{ $errors->has('twiiter') ? $errors->first('twiiter') : '' }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <label>Facebook:</label>
                <input type="text" name="facebook" value="{{ $configuracao->facebook ?? old('facebook') }}" placeholder="Facebook" style="width: 100%;">
                {{ $errors->has('facebook') ? $errors->first('facebook') : '' }}
            </div>
            <div class="col-6">
                <label>Whatsapp:</label>
                <input type="text" name="whatsapp" value="{{ $configuracao->whatsapp ?? old('whatsapp') }}" placeholder="Whatsapp" style="width: 100%;">
                {{ $errors->has('whatsapp') ? $errors->first('whatsapp') : '' }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <label>Youtube:</label>
                <input type="text" name="youtube" value="{{ $configuracao->youtube ?? old('youtube') }}" placeholder="Youtube" style="width: 100%;">
                {{ $errors->has('youtube') ? $errors->first('youtube') : '' }}
            </div>
            <div class="col-6">
                <label>Spotify:</label>
                <input type="text" name="spotify" value="{{ $configuracao->spotify ?? old('spotify') }}" placeholder="Spotify" style="width: 100%;">
                {{ $errors->has('spotify') ? $errors->first('spotify') : '' }}
            </div>
        </div>
        <br>
        <legend>Página de Contato Evangelismo</legend>
        <br>
        <div class="row">
            <div class="col-12">
                <p><label>Descrição para a página contato:</label></p>
                <textarea class="descricao_contato" name="descricao_contato" placeholder="Rodapé" style="width: 100% !important;">{{ $configuracao->descricao_contato ?? old('descricao_contato') }}</textarea>
                <script src="https://cdn.tiny.cloud/1/tscpebe2xv4vkktpkkorh3wcc0q4xctf2b7cuihi9z6f4j9u/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                {{ $errors->has('descricao_contato') ? $errors->first('descricao_contato') : '' }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <input type="file" id="arquivo" name="arquivo"><br><br>
                {{ $errors->has('arquivo') ? $errors->first('arquivo') : '' }}
            </div>
        </div>
        @if(isset($configuracao))
            @if($configuracao->arquivo)
                <div class="row">
                    <div class="col-12">
                        Arquivo: {{$configuracao->arquivo->nome_original}}
                        <a href="{{url('/')}}/storage/uploads/configuracao/{{$configuracao->arquivo->id}}/{{$configuracao->arquivo->arquivo}}"><img src="{{url('/')}}/storage/uploads/configuracao/{{$configuracao->arquivo->id}}/{{$configuracao->arquivo->arquivo}}" alt="configuracao"></a>
                    </div>
                </div><br>
            @endif
        @endif
        <button type="submit" class="btn btn-success">Atualizar</button>
    <form>
    <br><br><br>
@endif

<script type="text/javascript">
    $("#telefone").mask("(00) 00000-0000");
</script>

<script>
    tinymce.init({
        selector:'textarea.rodape',
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

    tinymce.init({
        selector:'textarea.descricao_contato',
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
