<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countrys';

    protected $fillable = [
        'name',
        'tourism_code',
        'country_code'
    ];
}
