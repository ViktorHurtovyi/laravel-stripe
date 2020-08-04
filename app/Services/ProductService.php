<?php

namespace App\Services;

use App\Helpers\GetPriceHelper;
use App\Order;
use App\Product;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductService
{
  public function index(): LengthAwarePaginator
  {
    return Product::paginate(10);
  }

  public function successfulPaid($input, Product $product){
    try{
      $order = $this->createOrder($product->price, GetPriceHelper::getShippingPrice($input['shipping_option']), $input['name'], $input['address']);
      mail(env('ADMIN_MAIL'), 'Successful Paid', "You have new order(id: {$order->id})");
    }catch (\Exception $e){
      return $e->getMessage();
    }
  }

  private function createOrder($productValue, $shippingValue, $name, $address){
    $order = new Order();
    $order->total_product_value = $productValue;
    $order->total_shipping_value = $shippingValue;
    $order->client_name = $name;
    $order->client_address = $address;
    $order->saveOrFail();
    return $order;
  }
}
