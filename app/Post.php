<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Nome da tabela
    protected $table = 'posts';
    // PK
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
