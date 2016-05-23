<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model {

	protected $table='product_images';

    protected $filltable=['name','product_id'];

    public $timestamps=false;

    public function product(){
        return $this->belongto('App\Product');
    }

}
