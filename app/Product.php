<?php

namespace milimetrica;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    protected $fillable = [
        'name',
        'description',
        'price',
        'price_old',
        'featured',
        'enabled_product',
        'division_product',
        'category_id'


    ];

    public function category(){
        return $this->belongsTo('milimetrica\Category','category_id', 'id');

    }

    public function images(){
        return $this->hasMany('milimetrica\ProductImage');

    }




}
