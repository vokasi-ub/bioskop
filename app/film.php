<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class film extends Model
{
    protected $table = 'film';
    protected $fillabel =['id_film','judul'];
    public $timestamps = true;
}
