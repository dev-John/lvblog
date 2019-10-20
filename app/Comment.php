<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Nome da tabela
    protected $table = 'comments';

    public $primaryKey = 'post_id';

    // Timestamps
    public $timestamps = true;

    public function post(){
        return $this->belongsTo('App\Post'); //o relacionamento que dizer que o comentario pertence ao post 
    }

    public function user(){
        return $this->belongsTo('App\User'); //o relacionamento que dizer que o post pertence ao usuario 
    }
}
