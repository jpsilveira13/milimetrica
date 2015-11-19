<?php

namespace milimetrica;

use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    protected $table = 'texto';
    protected $fillable = [
        'quem_somos',
        'missao',
        'visao',
        'valores'
    ];
}
