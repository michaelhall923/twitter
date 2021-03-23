<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];

    public function user() {
        $this->belongsTo(User::class);
    }

    public function tweet() {
        $this->belongsTo(Tweet::class);
    }
}
