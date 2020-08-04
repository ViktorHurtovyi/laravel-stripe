<?php

namespace App\Services;

use App\Product;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductService
{
  public function index(): LengthAwarePaginator
  {
    return Product::paginate(10);
  }
}
