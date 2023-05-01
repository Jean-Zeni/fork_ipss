<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contato</title>
</head>
<body style='font-family:Arial; font-size:11px; line-height:18px; text-align:center; margin:auto; padding:20px; color:rgb(50,50,50); background-color:#f1f1f1; font-weight:normal;'>
    <table width="700" align="center" cellpadding="0" cellspacing="0" style="border-bottom:5px solid #044d2b !important; background-color:#cde1d2;">
		<tr>
        	<td class="center"><img src="https://ipsapucaiadosul.com.br/images/topo-email-ipss.jpg" alt="Topo Email"></td>
        </tr>
        <tr>
            <td align="left" style="padding:20px">
                <table width="100%" border="0" cellpadding="0">
                    <tr>
                        <td>
                            <p>
                                <span style="width:100%; float:left; padding:7px 0px; margin-bottom:10px; border-radius:4px; background-color:rgb(255,255,255); text-align:center">
                                    <strong>Mensagem enviada pelo Site da Igreja Presbiteriana de Sapucaia do Sul</strong>
                                </span>
                                
                                <strong>Data do Contato: </strong> <?=date("d/m/Y")?><br/>
                                
                                @if ($contato->nome)
                                    <strong>Nome: </strong> {{$contato->nome}}<br/>
                                @endif
                
                                @if ($contato->email)
                                    <strong>Email: </strong> {{ $contato->email }}<br/>
                                @endif
                
                                @if ($contato->telefone)
                                    <strong>Telefone: </strong>{{ $contato->telefone }}<br/>
                                @endif

                                @if ($contato->mensagem)
                                    <strong>Mensagem: </strong> {{ $contato->mensagem }}<br/><br/>
                                @endif
                
                                @if ($contato->status)
                                    <strong>Status: </strong> <?= \App\Models\Contato::$statusList[$contato->status]?><br/><br/>
                                @endif
                
                                @if ($contato->resposta)
                                    <strong>Resposta: </strong> <?= $contato->resposta?><br/><br/>
                                @endif

                                @if ($contato->data_resposta)
                                    <strong>Data Resposta: </strong> <?= $contato->data_resposta->format('d/m/Y')?> às <?= $contato->data_resposta->format('H:i')?>hrs<br/><br/>
                                @endif
                                <br>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>