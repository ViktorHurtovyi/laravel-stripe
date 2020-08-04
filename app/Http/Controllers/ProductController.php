<?php

namespace App\Http\Controllers;

use App\Product;
use App\Services\ProductService;
use Illuminate\View\View;

class ProductController extends Controller
{
  public function index(): View
  {
    $service = new ProductService();
    $products = $service->index();
    return view('products.index', compact('products'));
  }

  public function checkout(Product $product){
    return view('products.checkout', compact('product'));
  }
}
