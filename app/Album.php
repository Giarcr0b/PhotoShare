<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = [
        'name', 'description', 'cover_image', 'user_id',
    ];

    public function Photos()
    {

        return $this->hasMany('photos');
    }
}