<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleEnterprise extends Model
{
    protected $table='modules_enterprises';

    protected $fillable = [
        'modules_id', 
        'enterprises_id'
    ];
}
