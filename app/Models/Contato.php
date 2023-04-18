<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    const STATUS_ABERTO = 1;
    const STATUS_RESPONDIDO = 2;

    const TIPO_CONTATO = 3;
    const TIPO_CONTATO_EVANGELISMO = 4;

    public static $statusList = [
        self::STATUS_ABERTO => 'Aberto',
        self::STATUS_RESPONDIDO => 'Respondido'
    ];

    public static $tipos = [
        self::TIPO_CONTATO => 'Contato',
        self::TIPO_CONTATO_EVANGELISMO => 'Duvida contato'
    ];

    public function getStatusLabel($withTag = true)
    {
        $status = (isset(self::$statusList[$this->status]))
            ? self::$statusList[$this->status]
            : 'Não informado';
        
        $class = 'default';
        
        switch ($this->status) {
            case self::STATUS_ABERTO:
                $class = 'danger';
                break;
            case self::STATUS_RESPONDIDO:
                $class = 'success';
                break;
        }
        
        $label = '<span class="radius4 fontBranco text-uppercase label-'.$class.'" style="font-size:.8em; letter-spacing:0.5px; padding:6px 12px; white-space:nowrap"><small>'.$status.'</small></span>';
        $html = ($withTag) ? '<span>' : '';
        $html .= $label;
        $html .= ($withTag) ? '</span>' : '';
        
        return $html;
    }

    use HasFactory;

    public function getTipoFormatado()
    {
        return isset(self::$tipos[$this->tipo]) ? self::$tipos[$this->tipo] : '';
    }

    public function getStatusFormatado()
    {
        return isset(self::$statusList[$this->status]) ? self::$statusList[$this->status] : '';
    }
}
