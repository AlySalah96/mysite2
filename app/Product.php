<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    
    public function supliersOf()
    {
        return $this->belongsToMany('App\Suplier','supliers_products_relations','prod_id','sup_id');
    }



}
