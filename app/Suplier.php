<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    //
    
    public function products()
    {
        return $this->belongsToMany('App\Product','supliers_products_relations','sup_id','prod_id');
    }
}
