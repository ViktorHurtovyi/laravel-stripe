<?php

namespace App\Helpers;

class GetPriceHelper
{
  public static function getShippingPrice($type): int
  {
    switch ($type){
      case 'standard':
        return 0;
      case 'express':
        return 10;
    }
  }

  public static function getAmount($product, $type): int
  {
    return $product->price + self::getShippingPrice($type);
  }
}
