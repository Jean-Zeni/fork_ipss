<div class="modal fade" id="modal-membro-{{$membro->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><strong>{{$membro->nome}}</strong></h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                @if ($membro->arquivo)
                    <div style="text-align:center;">
                        <img class="img-fluid" src="{{url('/')}}/storage/uploads/membro/{{$membro->arquivo->id}}/{{$membro->arquivo->arquivo}}" alt="{{$membro->nome}}" style="width: 252px; height: 252px;object-fit: contain;border: 1px solid #015b41;"><br><br>
                    </div>
                @endif
                @if ($membro->funcao)          
                    <strong>Função: </strong><?=$membro->funcao?><br>
                @endif
                @if ($membro->email)          
                    <strong>Email: </strong><?=$membro->email?><br>
                @endif
                @if ($membro->telefone)          
                    <strong>Telefone: </strong><?=$membro->telefone?><br>
                @endif
                @if ($membro->descricao)          
                    <br><?=$membro->descricao?>
                @endif
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>