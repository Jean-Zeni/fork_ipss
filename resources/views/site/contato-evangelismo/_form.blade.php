<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
 
 <div class="box-formulario">        
    <div class="formulario">
        <form action="{{ route('site.save-contato-evangelismo') }}" method="post">
            @csrf
            <span>
                <input type="text" class="input-balao-up" id="nome" name="nome" placeholder="Nome" autocomplete="off" />
                <label for="nome"><i class="material-symbols-outlined">person</i> </label>
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
            </span>
            <span>
                <input type="text" class="input-balao-up" id="email" name="email" placeholder="E-mail" autocomplete="off" />
                <label for="email"> <i class="material-symbols-outlined">mail</i> </label>
                {{ $errors->has('email') ? $errors->first('email') : '' }}
            </span>
            <span>
                <input type="text" class="input-balao-up" id="telefone" name="telefone" placeholder="Telefone" autocomplete="off" />
                <label for="telefone"> <i class="material-symbols-outlined">phone</i> </label>
                {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
            </span>
            <span>
                <textarea type="text" class="textarea-balao-up" id="mensagem" name="mensagem" rows="3" placeholder="Mensagem" autocomplete="off" ></textarea>
                <label for="mensagem"> <i class="material-symbols-outlined">comment</i> </label>
                {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
            </span>
            <div class="box-btn">
                    
                <button type="submit" class="btn-envia zoom-shadow">
                    <i class="icon icon-forward-1"> Enviar</i>
                </button>
            </div>
        </form>
    </div>
</div><!--Box Formulario--> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@NaN,0,0,0" />
<script type="text/javascript">
    $("#telefone").mask("(00) 00000-0000");
</script>