<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    public function person()
    {
        return $this->belongsTo(Person::class,'person_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class,'area_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class,'rank_id');
    }

    public function arl()
    {
        return $this->belongsTo(Arl::class,'arl_id');
    }

    public function eps()
    {
        return $this->belongsTo(Eps::class,'eps_id');
    }

    public function pension()
    {
        return $this->belongsTo(Pension::class,'pension_id');
    }

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class,'enterprise_id');
    }
}
