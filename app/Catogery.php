<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catogery extends Model
{
    //
    //protected $table='catogeries';


    // relation prod-cat
    public function productsOf()
    {
        return $this->hasMany('App\Product','cat_id','id');
    }
}
