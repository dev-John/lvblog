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

    public function user(){
        return $this->belongsTo('App\User'); //o relacionamento que dizer que o post pertence ao usuario 
    }

    public function comment(){
        return $this->hasMany('App\Comment'); //o relacionamento que dizer que o usuário tem muitos pots 
    }
}
