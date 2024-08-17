<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reflexao extends Model
{
    use HasFactory;
    protected $table = 'reflexoes';

    protected $fillable = ['nome', 'resumo', 'descricao', 'ativo', 'membro_id'];

    public static function rules(): array
    {
        return [
            'nome' => 'required|max:256',
            'resumo' => 'max:512',
            'ativo' => 'boolean',
            'membro_id' => 'required|exists:membros,id'
        ];
    }

    public static function feedback(): array
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
            'resumo.max' => 'O campo :attribute não pode ultrapassar 512 caracteres.',
            'membro_id.exists' => 'O membro informado não existe!',
            'membro_id.required' => 'O campo de membro deve ser selecionado!',
        ];
    }

    public function membro(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Membro', 'membro_id', 'id');
    }
}
