<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'data_publicacao', 'resumo', 'descricao', 'link', 'destaque'];

    protected $dates = ['created_at', 'updated_at', 'data_publicacao'];
}
