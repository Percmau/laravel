<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function messages(){
        return $this->belongsToMany('App\Models\Message');
    }
}
