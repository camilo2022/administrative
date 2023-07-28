<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    public function document_type()
    {
        return $this->belongsTo(DocumentType::class,'document_type_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}
