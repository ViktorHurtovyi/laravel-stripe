<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
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

  public function createOrder(OrderRequest $request){
    dd($request);
  }
}
