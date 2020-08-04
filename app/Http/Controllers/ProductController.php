<?php

namespace App\Http\Controllers;

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
}
