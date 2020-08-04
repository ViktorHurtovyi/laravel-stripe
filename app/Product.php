<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $guarded = [];

  protected $appends = ['brandName'];

  public function getBrandNameAttribute(){
    return $this->brand->name;
  }

  public function brand(){
    return $this->belongsTo(Brand::class);
  }
}
