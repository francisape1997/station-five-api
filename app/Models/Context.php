<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Context extends Model
{
    use HasFactory;

    public function message()
    {
        return $this->belongsTo('App\Models\ContextMessage', 'message_id');
    }
}
