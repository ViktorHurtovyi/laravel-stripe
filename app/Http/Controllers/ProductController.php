<?php

namespace App\Http\Controllers;

use App\Services\ProductService;

class ProductController extends Controller
{
  public function index()
  {
    $service = new ProductService();
    $products = $service->index();
    return view('products.index', compact('products'));
  }
}
