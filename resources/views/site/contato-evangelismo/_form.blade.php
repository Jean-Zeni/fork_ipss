<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
 
 <div class="box-formulario">        
    <div class="formulario">
        <form action="{{ route('site.save-contato') }}" method="post">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome">
                        <label for="name">Seu nome</label>
                    </div>
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                        <label for="email">Seu email</label>
                    </div>
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                        <label for="subject">Telefone</label>
                    </div>
                    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" id="mensagem" name="mensagem" placeholder="Mensagem" style="height: 100px"></textarea>
                        <label for="message">Mensagem</label>
                    </div>
                    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div><!--Box Formulario--> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@NaN,0,0,0" />
<script type="text/javascript">
    $("#telefone").mask("(00) 00000-0000");
</script>