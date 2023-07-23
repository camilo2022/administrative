<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['id', 'user', 'message', 'id_user'];

    public function user()
    {
        return $this->belongsTo(App\User);
    }
}
