<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'user_id',
        'chat_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function chat(){
        return $this->belongsTo('App\Models\Chat');
    }
}
