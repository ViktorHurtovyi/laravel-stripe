<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Product;
use App\Services\ProductService;
use App\Services\StripeService;
use Illuminate\View\View;

class ProductController extends Controller
{
  public function index(): View
  {
    $service = new ProductService();
    $products = $service->index();
    return view('products.index', compact('products'));
  }

  public function checkout(Product $product)
  {
    return view('products.checkout', compact('product'));
  }

  public function createOrder(OrderRequest $request, Product $product)
  {
    $input = $request->except('_token');
    $stripeService = new StripeService();
    try {
      $result = $stripeService->pay($input, $product);
    }catch (\Exception $e){
      return back()->with('status', 'Check your card data');
    }
    if ($result['status'] ==='succeeded'){
      $service = new ProductService();
      $service->successfulPaid($input, $product);
    }
    return redirect(route('products.list'))->with('status', 'Thank You for the Order! We will contact you soon!');
  }
}
