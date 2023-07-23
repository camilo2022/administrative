<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubModuleEnterprise extends Model
{
    protected $table='submodules_enterprises';

    protected $fillable = [
        'submodules_id', 
        'enterprises_id'
    ];
}
