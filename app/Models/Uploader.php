<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uploader extends Model
{
    protected $fillable = ['image'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
