<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'resumo', 'local', 'descricao', 'start', 'end'];

    protected $dates = ['created_at', 'updated_at', 'start', 'end'];

    public static function rules(): array
    {
        return [
            'title' => 'required|max:256',
        ];
    }

    public static function feedback(): array
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido'
        ];
    }
}
