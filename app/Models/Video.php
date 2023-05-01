<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'data_publicacao', 'resumo', 'descricao', 'link', 'destaque', 'devocional'];

    protected $dates = ['created_at', 'updated_at', 'data_publicacao'];

    public function getYouTubeId()
    {
        if (empty($this->link)) {
            return false;
        }

        $pattern =
            '%^# Match any youtube URL
                (?:https?://)?  # Optional scheme. Either http or https
                (?:www\.)?      # Optional www subdomain
                (?:             # Group host alternatives
                  youtu\.be/    # Either youtu.be,
                | youtube\.com  # or youtube.com
                  (?:           # Group path alternatives
                    /embed/     # Either /embed/
                  | /v/         # or /v/
                  | /watch\?v=  # or /watch\?v=
                  )             # End path alternatives.
                )               # End host alternatives.
                ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
                $%x'
        ;

        preg_match($pattern, $this->link, $matches);

        return (isset($matches[1])) ? $matches[1] : false;
    }    

    public function getThumbVideo()
    {
        if (empty($this->link)) {
            return false;
        }

        $linkId = $this->getYouTubeId();

        if (empty($linkId)) {
            return false;
        }

        return 'http://img.youtube.com/vi/'.$linkId.'/0.jpg';
    }
}
