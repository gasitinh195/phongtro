<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table='products';

    protected $filltable=['name','alias','price','intro','content','image','description','user_id','cate_id'];

    public $timestamps=false;

    public function cate(){
        return $this->belongto('App\cate');
    }

    public function user(){
        return $this->belongto('App\user');
    }

    public function proimage(){
        return $this->hasmany('App\ProductImage');
    }
}
